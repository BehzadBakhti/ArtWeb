<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Vendor::class, function (Faker $faker) {
    return [
        'user_id'=>function(){
            return App\User::where('user_role', 'vendor')->get()->random();
            },
        'name'=>$faker->realText(30),
        'type'=>function(){
            if(rand(0,2)>0){
                return 'company';
            }
            return 'person';
        },
        
    ];
});
