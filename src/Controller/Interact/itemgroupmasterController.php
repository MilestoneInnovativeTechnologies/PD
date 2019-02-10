<?php

namespace Milestone\PD\Controller\Interact;

use Illuminate\Http\Request;
use Milestone\PD\Controller\Controller;
use Milestone\PD\Model\ItemGroupMaster;

class itemgroupmasterController extends Controller
{

    public $Model = 'Milestone\PD\Model\ItemGroupMaster';
    public $Fillable = ['refno','catecode','gcode','name','type','status'];
    public $PrimaryTransform = null;
    public $PrimaryTransformMethod = 'getPrimaryValue';
    public $Transforms = [
        'catecode' => 'CATCODE',
        'gcode' => 'CODE',
        'name' => 'NAME',
        'type' => 'TYPE',
        'status' => 'STATUS',
    ];
    public $TransformMethods = [
        'refno' => 'getRefNo',
    ];

    public function getPrimaryValue($data){
        $catecode = $data['CATCODE']; $gcode = $data['CODE']; $refno = implode("/",[$catecode,$gcode]);
        $record = ItemGroupMaster::where(compact('refno'))->first();
        return $record ? $record->id : null;
    }

    public function getRefNo($data){ return implode("/",array_only($data,['CATCODE','CODE'])); }
}
