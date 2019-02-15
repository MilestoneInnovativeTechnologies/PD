<?php

namespace Milestone\PD\Controller;

use Illuminate\Http\Request;
use Milestone\PD\Model\Product;

class ProductController extends Controller
{
    public function detail($id){
        $Product = Product::find($id)->load(['Group01','Group02','Images']);
        $visitor = (new VisitorController)->getCurrentVisitor();
        return view('pd::product_details',compact('Product','visitor'));
    }
}
