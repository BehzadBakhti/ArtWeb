<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Post::class, function (Faker $faker) {
    $name='';
    return [
        
        'category_id'=>function(){
            return App\Model\Category::all()->random();
            },
            
        'title'=>$name=$faker->text(30),
        'slug'=>str_slug($name),
        'body' =>$faker-> realText(300,3),
        'featured' =>'uploads/posts/'.$faker->image(public_path('/uploads/posts'),500,500, 'business', false),
        'is_published'=>true,
        
    ];
});



