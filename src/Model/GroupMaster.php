<?php

namespace Milestone\PD\Model;

use Illuminate\Database\Eloquent\Model;

class GroupMaster extends Model
{
    protected $table = 'group_master';

    public function Items(){ return $this->hasMany(GroupDetail::class,'group','id'); }
}
