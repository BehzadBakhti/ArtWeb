<?php

use Faker\Generator as Faker;


$factory->define(App\Model\Product::class, function (Faker $faker) {
    return [
        'name'=>$faker-> word,
        'detail'=>$faker-> paragraph,
        'stock'=>$faker-> numberBetween(0,100),
        'price'=>$faker-> numberBetween(100,1000),
        'discount'=>$faker-> numberBetween(0,30),
        //
    ];
});
