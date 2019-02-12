<?php

namespace Milestone\PD\Controller\Interact;

use Illuminate\Http\Request;
use Milestone\PD\Controller\Controller;
use Milestone\PD\Model\GroupDetail;
use Milestone\PD\Model\GroupMaster;

class itemgroupmasterController extends Controller
{

    public $Model = GroupDetail::class;
    public $Fillable = ['refno','group','code','name','type','status'];
    public $PrimaryTransform = null;
    public $PrimaryTransformMethod = 'getPrimaryValue';
    public $Transforms = [
        'code' => 'CODE',
        'name' => 'NAME',
        'type' => 'TYPE',
        'status' => 'STATUS',
    ];
    public $TransformMethods = [
        'refno' => 'getRefNo',
        'group' => 'getGroupId'
    ];

    public function getPrimaryValue($data){
        $gcode = $data['CATCODE']; $code = $data['CODE']; $refno = implode("/",[$gcode,$gcode]);
        $record = GroupDetail::where(compact('refno'))->first();
        return $record ? $record->id : null;
    }

    public function getRefNo($data){ return implode("/",array_only($data,['CATCODE','CODE'])); }
    public function getGroupId($data){ $rec = GroupMaster::where('code',$data['CATCODE'])->first(); return $rec ? $rec->id : null; }
}
