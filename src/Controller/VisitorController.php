<?php

namespace Milestone\PD\Controller;

use Illuminate\Http\Request;
use Milestone\PD\Model\Visitor;
use Illuminate\Support\Facades\Cookie;

class VisitorController extends Controller
{
    public function store(){
        $email = request('email'); $number = request('number'); $name = request('name');
        $visitor = $this->AddOrGetVisitor($email,$name,$number);
        $vid = $visitor->id;
        return back()->cookie('__pd_visitor',$vid,30*24*60,'/');
    }
    public function clear(){
        $cclr = null;
        if(request('_clu') && request('_clu') === Cookie::get('__pd_visitor')){
            $cclr = true; return back()->with(compact('cclr'))->cookie('__pd_visitor',request('_clu'),-1,'/');
        }
        return back()->with(compact('cclr'));
    }
    public function getCurrentVisitor(){
        $vid = Request()->cookie('__pd_visitor');
        return $vid ? Visitor::find($vid) : null;
    }
    public function AddOrGetVisitor($email,$name = null,$number = null){
        $visitor = null;
        if($email) $visitor = Visitor::where('email',$email)->first();
        if(!$visitor && $number) $visitor = Visitor::where('number',$number)->first();
        if(!$visitor) $visitor = new Visitor;
        $visitor->forceFill(array_filter(compact('name','email','number')))->save();
        return $visitor;
    }
}
