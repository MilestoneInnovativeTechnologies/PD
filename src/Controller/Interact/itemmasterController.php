<?php

namespace Milestone\PD\Controller\Interact;

use Illuminate\Http\Request;
use Milestone\PD\Controller\Controller;
use Milestone\PD\Model\GroupDetail;
use Milestone\PD\Model\Product;
use Milestone\PD\Model\ItemGroupMaster;

class itemmasterController extends Controller
{

    public $Model = 'Milestone\PD\Model\Product';
    public $Fillable = ['name','code','description','narration','narration2','narration3','narration4','narration5','narration6','narration7','narration8','narration9','narration10','refno','ref2no','itemserial','type','group01','group02','group03','group04','group05','group06','group07','group08','group09','group10','status'];
    public $PrimaryTransform = null;
    public $PrimaryTransformMethod = 'getPrimaryValue';
    public $Transforms = [
        'code' => 'CODE',
        'description' => 'NARRATION',
        'narration' => 'NARRATION',
        'narration2' => 'NARRATION2',
        'narration3' => 'NARRATION3',
        'narration4' => 'NARRATION4',
        'narration5' => 'NARRATION5',
        'narration6' => 'NARRATION6',
        'narration7' => 'NARRATION7',
        'narration8' => 'NARRATION8',
        'narration9' => 'NARRATION9',
        'narration10' => 'NARRATION10',
        'refno' => 'REFNO',
        'ref2no' => 'REF2NO',
        'itemserial' => 'ITEMSERIAL',
        'status' => 'STATUS'
    ];
    public $TransformMethods = [
        'name' => 'getName',
        'group01' => 'getGroup01',
        'group02' => 'getGroup02',
        'group03' => 'getGroup03',
        'group04' => 'getGroup04',
        'group05' => 'getGroup05',
        'group06' => 'getGroup06',
        'group07' => 'getGroup07',
        'group08' => 'getGroup08',
        'group09' => 'getGroup09',
        'group10' => 'getGroup10',
    ];

    public function getPrimaryValue($data){
        $record = Product::where('code',$data['CODE'])->first();
        return $record ? $record->id : null;
    }

    public function getName($data){ return $this->getGroupName($data,'03'); }
    public function getGroup01($data){ return $this->getGroup($data,'01'); }
    public function getGroup02($data){ return $this->getGroup($data,'02'); }
    public function getGroup03($data){ return $this->getGroup($data,'03'); }
    public function getGroup04($data){ return $this->getGroup($data,'04'); }
    public function getGroup05($data){ return $this->getGroup($data,'05'); }
    public function getGroup06($data){ return $this->getGroup($data,'06'); }
    public function getGroup07($data){ return $this->getGroup($data,'07'); }
    public function getGroup08($data){ return $this->getGroup($data,'08'); }
    public function getGroup09($data){ return $this->getGroup($data,'09'); }
    public function getGroup10($data){ return $this->getGroup($data,'10'); }

    private function getGroup($data,$num){
        $gcode = $data['CATCODE_' . $num]; $code = $data['GCODE_' . $num];
        return $this->getGroupCode($gcode,$code);
    }

    private function getGroupCode($gcode,$code){
        $refno = implode("/",[$gcode,$code]);
        $record = GroupDetail::where(compact('refno'))->first();
        return $record ? $record->id : null;
    }

    private function getGroupName($data,$num){
        $gcode = $data['CATCODE_' . $num]; $code = $data['GCODE_' . $num];
        $refno = implode("/",[$gcode,$code]);
        $record = GroupDetail::where(compact('refno'))->first();
        return $record ? $record->name : null;
    }

}
