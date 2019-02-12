<?php

namespace Milestone\PD\Controller\Interact;

use Illuminate\Http\Request;
use Milestone\PD\Controller\Controller;
use Milestone\PD\Model\GroupMaster;

class itemgroupController extends Controller
{

    public $Model = GroupMaster::class;
    public $Fillable = ['code','name','type','status'];
    public $PrimaryTransform = null;
    public $PrimaryTransformMethod = 'getPrimaryValue';
    public $Transforms = [
        'code' => 'CODE',
        'name' => 'NAME',
        'type' => 'TYPE',
        'status' => 'STATUS',
    ];
    public $TransformMethods = [];

    public function getPrimaryValue($data){
        $record = GroupMaster::where('code',$data['CODE'])->first();
        return $record ? $record->id : null;
    }
}
