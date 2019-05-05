<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Post::class, function (Faker $faker) {
    $name='';
    return [
        
        'category_id'=>function(){
            return App\Model\Category::all()->random();
            },
        'user_id'=>function(){
                return App\User::all()->random();
                },
        'title'=>$name=$faker->realText(30),
        'slug'=>str_slug($name),
        'body' =>$faker-> realText(2000,5),
        'read_count'=>$faker->numberBetween(0,20),
        'featured' =>'uploads/posts/'.$faker->image(public_path('/uploads/posts'),800,500, 'business', false),
        'is_published'=>true,
        
    ];
});



