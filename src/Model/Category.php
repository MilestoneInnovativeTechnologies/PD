<?php

namespace Milestone\PD\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function Products(){
        return $this->hasMany(Product::class,'category');
    }
}
