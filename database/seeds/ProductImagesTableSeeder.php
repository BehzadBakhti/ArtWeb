<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProductImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run(Faker $faker)
    {
        
        
        $products=App\Model\Product::all();
        foreach($products as $product){
            
            App\Model\ProductImage::create([
                       'product_id' => $product->id,
                       'image_name' =>'uploads/products/'.$faker->image(public_path('/uploads/products'),400,400, 'technics', false),
                    ]);

            App\Model\ProductImage::create([
                        'product_id' => $product->id,
                        'image_name' =>'uploads/products/'.$faker->image(public_path('/uploads/products'),400,400, 'sports', false),
                     ]);
                    
        };
    }
}
