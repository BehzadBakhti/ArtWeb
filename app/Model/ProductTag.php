<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    public function products(){

        return $this->belongsToMany('App\Model\Product');
    }
}
