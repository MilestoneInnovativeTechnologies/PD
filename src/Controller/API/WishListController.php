<?php

namespace Milestone\PD\Controller\API;

use Illuminate\Http\Request;
use Milestone\PD\Model\ProductField;
use Milestone\PD\Model\Visitor;
use Milestone\PD\Model\VisitorWishlist;
use Milestone\PD\Model\Wishlist;
use Milestone\PD\Model\WishlistNote;

class WishListController extends Controller
{

    private $create_attrs = ['name','description'];
    public function detail(Request $request){
        if(is_null($request->get('id'))) return $this->noWLResponse();
        $wid = $request->get('id');
        return self::wishlist($wid);
    }

    private function noWLResponse(){ return []; }
    private function errorWLResponse(){ return ['error' => true, 'message' => 'User and Wish List name shouldn\'t be empty!']; }
    private function noPrivilegeResponse(){ return ['error' => true, 'message' => 'Requested user have no privilege to access this wish list!']; }
    private function shareeInvalid(){ return ['error' => true, 'message' => 'Email is mandatory!']; }
    private function noteInvalid(){ return ['error' => true, 'message' => 'Message body is mandatory!']; }

    static function wishlist($wid){
        $app = new self(); $wishlist = $app->getWL($wid);
        if(is_null($wishlist)) return $app->noWLResponse();
        $items = $app->getItems($wid)->toArray();
        $shares = $app->getShares($wid)->toArray();
        $notes = $app->getNotes($wid)->toArray();
        return compact('wishlist','items','shares','notes');
    }
    public function getWL($id){ return Wishlist::select(['id','name','description','author','status'])->with(['Author' => function($Q){ $Q->select(['id','name','email','number']); },'Vendor' => function($Q){ $Q->select(['id','wishlist','status']); }])->find($id); }
    public function getShares($id){ return Wishlist::with(['Share' => function($Q){ $Q->select(['id','visitor','wishlist'])->with(['Visitor' => function($Q){ $Q->select(['id','name','email','number']); }]); }])->find($id)->Share->map->Visitor; }
    public function getNotes($id){ return Wishlist::with(['Notes' => function($Q){ $Q->select(['id','wishlist','note','author','created_at'])->with(['Author' => function($Q){ $Q->select(['id','name']); }]); }])->find($id)->Notes->map(function($data){ return collect($data)->only(['id','note','created_at'])->merge(['author' => $data->Author->name]); }); }
    public function getItems($id){
        return Wishlist::with([
            'Items' => function($Q){ $Q->with([
                'Added' => function($Q){ $Q->select(['id','name']); },
                'Removed' => function($Q){ $Q->select(['id','name']); },
                'Product' => function($Q){
                    $fields = array_merge(ProductController::$detailFields,ProductField::pluck('field_name')->toArray());
                    $groups = array_intersect(array_map('strtolower',ProductController::$relationsGroup),$fields);
                    $Q->select($fields)->with($groups); }
                ])
                ->select(['id','wishlist','product','quantity','added_by','added_on','removed_by','removed_on','product_status']); }
                ])
            ->find($id)
            ->Items;
    }

    public function isAuth($user,$wl){ return !(!$user || !($visitor = Visitor::find($user)) || !$wl || !($wishlist = $visitor->Wishlists()->find($wl))); }

    public function create($user, Request $request){
        if(!$user || !($visitor = Visitor::find($user)) || !$request->name) return $this->errorWLResponse();
        $WL = new Wishlist(); foreach($this->create_attrs as $name) $WL->$name = $request->get($name);
        $wl = $visitor->Wishlists()->save($WL);
        if($request->get('product')) $wl->Products()->attach([$request->get('product') => ['added_by' => $visitor->id,'added_on' => date('Y-m-d H:i:s')]]);
        return array_merge(['create' => $wl->load('Items')],self::wishlist($wl->id));
    }

    public function delete($user,$wl){
        if(!$this->isAuth($user,$wl)) return $this->noPrivilegeResponse();
        $wishlist = Visitor::find($user)->Wishlists()->find($wl);
        $wishlist->status = 'Inactive'; $wishlist->save();
        return array_merge(['delete' => $wishlist],VisitorController::visitor($user));
    }

    public function product_add($user,$wl,$product,Request $request){
        if(!$user || !($visitor = Visitor::find($user)) || !$wl || !($wishlist = $visitor->Wishlists()->find($wl) ?: $visitor->SharedWishlist()->find($wl))) return $this->noPrivilegeResponse();
        $prd = $wishlist->Items()->where(compact('product'));
        if($prd->exists()) $item = $this->wl_product($prd->first(),$user);
        else{ $wishlist->Products()->attach($product); $item = $this->wl_product($wishlist->Items()->where(compact('product'))->first(),$user); }
        if($request->has('quantity')) $item = $this->wli_quantity($item,$request->quantity ?: 1);
        return array_merge(['add' => $item],self::wishlist($wl));
    }

    public function product_remove($user,$wl,$product){
        if(!$user || !($visitor = Visitor::find($user)) || !$wl || !($wishlist = $visitor->Wishlists()->find($wl) ?: $visitor->SharedWishlist()->find($wl))) return $this->noPrivilegeResponse();
        $prd = $wishlist->Items()->where(compact('product'));
        if($prd->exists()) $item = $this->wl_product($prd->first(),$user,'remov');
        else{ $wishlist->Products()->attach($product); $item = $this->wl_product($wishlist->Items()->where(compact('product'))->first(),$user,'remove'); }
        return array_merge(['remove' => $item],self::wishlist($wl));
    }

    private function wl_product($item,$user,$activity = 'add'){
        $mode = $activity . 'ed_by'; $on = $activity . 'ed_on'; $status = $activity == 'add' ? 'Active' : 'Inactive';
        $item->$mode = $user; $item->$on = date('Y-m-d H:i:s'); $item->product_status = $status;
        if($activity == 'add') $item->removed_by = null;
        $item->save(); return $item;
    }

    private function wli_quantity($item,$quantity){
        $item->quantity = $quantity;
        $item->save(); return $item;
    }

    public function share($user,$wl,Request $request){
        if(!$user || !($visitor = Visitor::find($user)) || !$wl || !($wishlist = $visitor->Wishlists()->find($wl) ?: $visitor->SharedWishlist()->find($wl))) return $this->noPrivilegeResponse();
        if(!$request->get('email')) return $this->shareeInvalid();
        $sharee = VisitorController::AddOrGetVisitor($request->get('email'),$request->get('name',' '),$request->get('number'));
        if(!$wishlist->Share()->where('visitor',$sharee->id)->exists()){
            $vwl = new VisitorWishlist; $vwl->visitor = $sharee->id;
            $wishlist->Share()->save($vwl);
        }
        return array_merge(['share' => $wishlist->Share],self::wishlist($wl));
    }

    public function note($user,$wl,Request $request){
        if(!$user || !($visitor = Visitor::find($user)) || !$wl || !($wishlist = $visitor->Wishlists()->find($wl) ?: $visitor->SharedWishlist()->find($wl))) return $this->noPrivilegeResponse();
        if(!$request->get('message')) return $this->noteInvalid();
        $wln = new WishlistNote; $wln->author = $user; $wln->note = $request->get('message');
        $wishlist->Notes()->save($wln);
        return array_merge(['note' => $wln],self::wishlist($wl));
    }

    public function vendor($user,$wl,$status){
        if(!$user || !($visitor = Visitor::find($user)) || !$wl || !($wishlist = $visitor->Wishlists()->find($wl) ?: $visitor->SharedWishlist()->find($wl))) return $this->noPrivilegeResponse();
        if($status == 'Active' || $status == 'Inactive') { $wishlist->Vendor->status = $status; $wishlist->push(); }
        return array_merge(['vendor' => $wishlist->Vendor],self::wishlist($wl));
    }

}
