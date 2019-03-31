<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    public function Product(){

        return $this->belongsTo('App\Model\Product');
    }

    protected $fillable =['image_name', 'product_id'];
}
