<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    public function products(){
        return $this->hasMany(App\Model\Product::class);
     }


     public function parent(){

      $parent = $this->belongsTo(self::class, 'parent_id');
    //   if(isset($parent->childeren)) {
    //     $parent->childeren->merge($parent);
    //   }
      return $parent;

     }


     public function childeren(){

        $childeren=  $this->hasMany(self::class, 'parent_id');

        // foreach($children as $child) {
        //     $child->mom = $this;
        //   }
          return $childeren;
     }

}
