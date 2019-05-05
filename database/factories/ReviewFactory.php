<?php

use Faker\Generator as Faker;
use App\Model\Product;
use App\User;

$factory->define(App\Model\Review::class, function (Faker $faker) {
  
    return [

        'product_id'=>function(){
            return Product::all()->random();
        },
        'user_id'=> function(){
            return User::all()->random();
        },
       'title' =>$faker-> realText(15),
       'review' =>$faker-> realText(200 ,2),
       'star'=>$faker-> numberBetween(0,5),
       'qualified'=>function(){
           if(rand(0,2)){
               return true;
           }else{
               return false;
           }
       }

        //
    ];
});
