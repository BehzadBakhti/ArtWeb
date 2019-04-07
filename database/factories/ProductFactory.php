<?php

use Faker\Generator as Faker;
use App\Model\ProductCategory;


$factory->define(App\Model\Product::class, function (Faker $faker) {
    return [
        'name'=>$faker-> word,
        'detail'=>$faker-> paragraph,
        'description'=>$faker->realText(200,2),
        'product_category_id'=>function(){
            return ProductCategory::all()->random();
        },
        'stock'=>$faker-> numberBetween(0,100),
        'price'=>$faker-> numberBetween(10000,1000000),
        'dimension'=>$faker->numberBetween(1,100)."x".$faker->numberBetween(1,100)."x".$faker->numberBetween(1,100),
        'discount'=>$faker-> numberBetween(0,30),
        'material'=>$faker-> word,
        //
    ];
});
