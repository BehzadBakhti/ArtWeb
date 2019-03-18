<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Product;

class Review extends Model
{
    //
    Public function product(){
        return $this-> belongsTo('App\Model\Product');
    }
}
