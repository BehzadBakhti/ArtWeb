<?php

use Faker\Generator as Faker;

$factory->define(App\ProductImage::class, function (Faker $faker) {
    return     $faker->image('/public/uploads/products',400,400, 'people', false);
  
});
