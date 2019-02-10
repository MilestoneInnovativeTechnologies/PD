<?php

namespace Milestone\PD\Controller;

use Illuminate\Http\Request;
use Milestone\PD\Model\Wishlist;
use Milestone\PD\Model\WishlistProduct;
use Milestone\PD\Model\WishlistProductNote;

class WishListProductController extends Controller
{
    public function note(Request $request){
        if(trim($request->note) === "") return back();
        $visitor = (new VisitorController)->getCurrentVisitor(); if(!$visitor) return back();
        $wishlist = $request->wishlist ? Wishlist::find($request->wishlist) : null;
        if(!$wishlist || ($wishlist->author != $visitor->id && !$wishlist->Visitors->where('id',$visitor->id)->count())) return back();
        $wlp = $request->wishlistproduct ? WishlistProduct::find($request->wishlistproduct) : null;
        $wlp->Notes()->save((new WishlistProductNote)->forceFill(['note' => trim($request->note), 'author' => $visitor->id]));
        return back();
    }
}
