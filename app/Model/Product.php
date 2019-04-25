<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Review;
use Laravel\Scout\Searchable;

class Product extends Model
{

    use Searchable;
    public function toSearchableArray()
    {
        $array = [
        'id'=>$this->id,
        'name'=>$this->name,
        'detail'=>$this->detail,
        'description'=>$this->description,
        ];
        // Customize array...

        return $array;
    }

    //
    public function reviews(){
        return $this->hasMany('App\Model\Review');

    }


    public function product_category(){

        return $this-> belongsTo('App\Model\ProductCategory');

    }
    
    
    public function images(){

        return $this->hasMany('App\Model\ProductImage');
    }

    public function specs(){

        return $this->hasMany('App\Model\Spec');
    }


    public function tags(){

        return $this->belongsToMany('App\Model\ProductTag');
    }

    protected $fillable =['name','detail','description', 'dimension', 'material', 'product_category_id', 'default_img_id', 'stock','price','discount'];

     

}
