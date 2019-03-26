<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Review;

class Product extends Model
{
    //
    public function reviews(){
        return $this->hasMany('App\Model\Review');

    }

    protected $fillable =['name','detail', 'dimension', 'material', 'product_category', 'default_img_id', 'stock','price','discount'];

     

}
