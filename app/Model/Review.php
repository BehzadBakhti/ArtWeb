<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Product;

class Review extends Model
{
    //
    protected $fillable=['title', 'review', 'product_id', 'user_id', 'star', 'qualified'];

    Public function product(){
        return $this-> belongsTo('App\Model\Product');
    }

    Public function user(){
        return $this-> belongsTo('App\User');
    }
}
