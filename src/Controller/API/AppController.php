<?php

namespace Milestone\PD\Controller\API;

use Illuminate\Http\Request;
use Milestone\PD\Model\GroupMaster;

class AppController extends Controller
{
    private $perPage = 16;
    public function init(Request $request){
        $app = [];
        $app['group_master'] = $this->getGroupMaster()->toArray();
        if($request->user){
            $user = VisitorController::visitor($request->user);
            $app = array_merge($app,$user);
        }
        return $app;
    }

    private function getGroupMaster(){ return GroupMaster::all()->map(function($gm){ return $gm->only(['id','name']); }); }

    public function index(Request $request){
        $Query = ProductController::ProductsQuery();
        $Query = $request->get('term') ? $this->ApplySeacrh($Query,$this->LikeTerm($request->term)) : $Query;
        $per_page = $request->get('per_page') ?: $this->perPage; $term = $request->term;
        return $Query->paginate($per_page)->appends(compact('per_page','term'));
    }
    private function LikeTerm($term){
        return join("",['%',$term,'%']);
    }
    private function ApplySeacrh($Query,$Term){
        if(empty($Term)) return $Query;
        return $Query->where(function($Q)use($Term){
            foreach(ProductController::$SearchFields as $search) $Q->orWhere($search,'like',$Term);
        });
    }

}
