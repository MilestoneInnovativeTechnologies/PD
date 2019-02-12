<?php

namespace Milestone\PD\Controller\Interact;

use Illuminate\Http\Request;
use Milestone\PD\Controller\Controller;

class ControllerTemplate extends Controller
{

    public $Model = ''; // The Model class to which this particular controller aims. Ex: GroupMaster::class
    public $Fillable = []; // Fillable field. All fields to be filled by this controller.
    public $PrimaryTransform = null; // Not yet started using it
    public $PrimaryTransformMethod = '';  // This should be the name of method which will return Primary Key Value from the database, from the data this method is received as argument
    public $Transforms = []; // Its actually mapping of local table column(from fillable) to received table column(from data of received JSON). Ex: ['code' => 'CODE']
    public $TransformMethods = []; // If any method need to be used while mapping local to received. It should be mentioned here. Ex: ['refno' => 'getRefnoFromData']. And this method should define in same file as a public

    // This function is mandatory while updating, reading or deleting existing data. This method should return primary key value of the record from data it should receive as argument.
    public function getPrimaryValue($data){
        $catecode = $data['CATCODE']; $gcode = $data['CODE']; $refno = implode("/",[$catecode,$gcode]);
        $record = ItemGroupMaster::where(compact('refno'))->first();
        return $record ? $record->id : null;
    }
}
