<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Product;
use App\User;


class Brand extends Model
{
    public function products(){
        return $this->hasMany(Product::class);
     }

     public function user(){
         return $this->belongsTo(User::class);
     }

}
