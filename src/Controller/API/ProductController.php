<?php

namespace Milestone\PD\Controller\API;

use Illuminate\Http\Request;
use Milestone\PD\Model\Product;

class ProductController extends Controller
{
    static $SearchFields = ['description'];
    public $relationsGroup = ['Group01','Group02','Group03','Group04','Group05','Group06','Group07','Group08','Group09','Group10'];

    static function ProductsQuery(){
        $relationsGroup = (new self)->relationsGroup;
        $Query = Product::with($relationsGroup)->where(['type' => 'Public','status' => 'Active']);
        foreach($relationsGroup as $g) $Query->where(function($Q)use($g){ $Q->whereNull(strtolower($g))->orWhereHas($g,function($Q){ $Q->web(); }); });
        return $Query;
    }

    public function detail(Request $request){
        if(is_null($request->get('id'))) return $this->noProductResponse();
        return Product::with($this->relationsGroup)->find($request->get('id')) ?: $this->noProductResponse();
    }

    private function noProductResponse(){
        return [];
    }
}
