<?php

namespace Milestone\PD\Controller\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Milestone\PD\Model\Visitor;
use Milestone\PD\Model\VisitorWishlist;
use Milestone\PD\Model\Wishlist;

class VisitorController extends Controller
{
    public function detail(Request $request){
        if(is_null($request->get('id'))) return $this->noUserResponse();
        $uid = $request->get('id');
        return self::visitor($uid);
    }

    private function noUserResponse(){ return []; }
    private function registerErrorResponse(){ return ['error' => true, 'message' => 'Name and Email are mandatory']; }

    static function visitor($id){
        $app = new self(); $user = $app->getUser($id);
        if(is_null($user)) return $app->noUserResponse();
        $wish_lists = $app->getUserWL($id)->toArray(); $shared_wish_lists = $app->getSharedWL($id)->toArray();
        return compact('user','wish_lists','shared_wish_lists');
    }

    private function getUser($user){ return Visitor::select(['id','name','email','number'])->find($user); }
    private function getUserWL($user){ return Wishlist::select(['id','name','description'])->where(['author' => $user,'status' => 'Active'])->with(['Vendor','Products' => function($Q){ $Q->select([DB::raw('products.id'),'name','description']); }])->get(); }
    private function getSharedWL($user){ return VisitorWishlist::where(['visitor' => $user,'status' => 'Active'])->with(['Wishlist' => function($Q){ $Q->select(['id','name','description','author'])->with(['Vendor','Author' => function($Q){ $Q->select(['id','name','number','email']); }]); }])->get()->map->Wishlist; }

    static function AddOrGetVisitor($email,$name = '',$number = null){
        $visitor = null;
        if($email) $visitor = Visitor::where('email',$email)->first();
        if(!$visitor && $number) $visitor = Visitor::where('number',$number)->first();
        if(!$visitor) $visitor = new Visitor;
        $visitor->forceFill(array_filter(compact('name','email','number')))->save();
        return $visitor;
    }

    public function register(Request $request){
        if(!$request->get('email') || !$request->get('name')) return $this->registerErrorResponse();
        $visitor = self::AddOrGetVisitor($request->get('email'),$request->get('name'),$request->get('number'));
        return self::visitor($visitor->id);
    }

}
