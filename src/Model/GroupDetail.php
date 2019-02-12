<?php

namespace Milestone\PD\Model;

use Illuminate\Database\Eloquent\Model;

class GroupDetail extends Model
{
    protected $table = 'group_details';

    public function Group01Products(){ return $this->hasMany(Product::class,'group01','id'); }
    public function Group02Products(){ return $this->hasMany(Product::class,'group02','id'); }
    public function Group03Products(){ return $this->hasMany(Product::class,'group03','id'); }
    public function Group04Products(){ return $this->hasMany(Product::class,'group04','id'); }
    public function Group05Products(){ return $this->hasMany(Product::class,'group05','id'); }
    public function Group06Products(){ return $this->hasMany(Product::class,'group06','id'); }
    public function Group07Products(){ return $this->hasMany(Product::class,'group07','id'); }
    public function Group08Products(){ return $this->hasMany(Product::class,'group08','id'); }
    public function Group09Products(){ return $this->hasMany(Product::class,'group09','id'); }
    public function Group10Products(){ return $this->hasMany(Product::class,'group10','id'); }
    public function Master(){ return $this->belongsTo(GroupMaster::class,'group','id'); }

    public function scopeGroup($Query,$group){ $Query->where(compact('group')); }
    public function scopeWeb($Query){ $Query->where('list','Yes'); }
    public function scopeListOnly($Query){ $Query->select(['list']); }
}
