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


    public function product_category(){

        return $this-> belongsTo('App\Model\ProductCategory');

    }
    
    
    public function images(){

        return $this->hasMany('App\Model\ProductImage');
    }


    public function tags(){

        return $this->belongsToMany('App\Model\ProductTag');
    }

    protected $fillable =['name','detail', 'dimension', 'material', 'product_category_id', 'default_img_id', 'stock','price','discount'];

     

}
