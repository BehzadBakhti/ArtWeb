<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    public function Product(){

        return $this->belongsTo('App\Model\Product');
    }

    protected $fillable=['key', 'value', 'product_id'];
}
