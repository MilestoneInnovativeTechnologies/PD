<?php

namespace Milestone\PD\Controller\API;

use Illuminate\Http\Request;
use Milestone\PD\Model\Product;
use Milestone\PD\Model\ProductField;

class ProductController extends Controller
{
    static $SearchFields = ['description'], $detailFields = ['id','name','description'];
    public $relationsGroup = ['Group01','Group02','Group03','Group04','Group05','Group06','Group07','Group08','Group09','Group10'];

    static function ProductsQuery(){
        $self = new self;
        $fields = array_merge($self::$detailFields,ProductField::pluck('field_name')->toArray());
        $groups = array_intersect(array_map('strtolower',$self->relationsGroup),$fields);
        $Query = Product::select($fields)->with($groups)->where(['type' => 'Public','status' => 'Active']);
        foreach($self->relationsGroup as $g) {
            $Query->where(function($Q)use($g,$groups){
                if(in_array(strtolower($g),$groups)) $Q->whereNull(strtolower($g))->orWhereHas($g,function($Q){ $Q->web(); });
            });
        }
        return $Query;
    }

    public function detail(Request $request){
        if(is_null($request->get('id'))) return $this->noProductResponse();
        $fields = ProductField::pluck('field_name')->toArray();
        $groups = array_intersect(array_map('strtolower',$this->relationsGroup),$fields);
        return self::product($request->get('id'),$fields,$groups) ?: $this->noProductResponse();
    }

    static public function product($id,$fields = ['id'],$groups = ['group01']){
        $fields = array_merge(self::$detailFields,$fields,array_map('strtolower',$groups));
        return Product::select($fields)->with($groups)->find($id);
    }

    private function noProductResponse(){
        return [];
    }
}
