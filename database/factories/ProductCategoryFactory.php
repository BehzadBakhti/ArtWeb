<?php

use Faker\Generator as Faker;
use App\Model\ProductCategory;

$factory->define(App\Model\ProductCategory::class, function (Faker $faker) {
    return [
        'name'=>$faker-> word,
        'parent_id'=>function(){
                        $cat= ProductCategory::all();
                        if($cat->count()>0 ){
                            return $cat->random();
                        }else{
                            return 0;
                        }
                    },
        
        //
    ];
});
