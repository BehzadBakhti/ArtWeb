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



    public function observations(){
        return $this->hasMany('App\Model\Observation');

    }

    public function product_category(){

        return $this-> belongsTo('App\Model\ProductCategory');

    }
    
    public function brand(){

        return $this-> belongsTo('App\Model\Brand');

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

    public function orders(){

        return $this->belongsToMany('App\Model\Order')->withPivot('quantity');
    }

    public function cargoes(){

        return $this->belongsToMany('App\Model\Cargo')->withPivot('quantity');
    }
    protected $fillable =['name','detail','description', 'dimension', 'material', 'product_category_id', 'default_img_id', 'stock','price','discount'];

     

}
