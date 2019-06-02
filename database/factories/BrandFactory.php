<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Brand::class, function (Faker $faker) {
    return [
        'user_id'=>function(){
            return App\User::where('user_role', 'vendor')->get()->random();
            },
        'name'=>$faker->realText(25),
        'logo'=>$faker->word,
        'description'=>$faker->realText(200),
            
    ];
});

