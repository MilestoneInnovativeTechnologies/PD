<?php

namespace Milestone\PD\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $with = ['Images'];

    public function Group01(){ return $this->belongsTo(GroupDetail::class, 'group01', 'id'); }
    public function Group02(){ return $this->belongsTo(GroupDetail::class, 'group02', 'id'); }
    public function Group03(){ return $this->belongsTo(GroupDetail::class, 'group03', 'id'); }
    public function Group04(){ return $this->belongsTo(GroupDetail::class, 'group04', 'id'); }
    public function Group05(){ return $this->belongsTo(GroupDetail::class, 'group05', 'id'); }
    public function Group06(){ return $this->belongsTo(GroupDetail::class, 'group06', 'id'); }
    public function Group07(){ return $this->belongsTo(GroupDetail::class, 'group07', 'id'); }
    public function Group08(){ return $this->belongsTo(GroupDetail::class, 'group08', 'id'); }
    public function Group09(){ return $this->belongsTo(GroupDetail::class, 'group09', 'id'); }
    public function Group10(){ return $this->belongsTo(GroupDetail::class, 'group10', 'id'); }

    public function Images(){ return $this->hasMany(ProductImage::class, 'product')->where('status','Active'); }
    public function Wishlists(){ return $this->belongsToMany(Wishlist::class, 'wishlist_products','product','wishlist')->wherePivot('status','Active')->wherePivot('product_status','Active')->withTimestamps(); }
}
