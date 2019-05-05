<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Comment::class, function (Faker $faker) {
    $name='';
    return [
        
        'post_id'=>function(){
            return App\Model\Post::all()->random();
            },
            
        'user_name'=>$name=$faker->name(30),
        'email'=>$name=$faker->email,
        'body' =>$faker-> realText(100),
        'qualified'=>function(){
            if(rand(0,2)){
                return true;
            }else{
                return false;
            }
        }
        
    ];
});



