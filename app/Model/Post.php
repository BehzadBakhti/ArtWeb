<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
use SoftDeletes;

    protected $fillable = [
        'title', 'body', 'category_id', 'featured', 'slug', 'is_published'
    ];

    public function getFeaturedAttribute($featured){

        return asset($featured);
    }

    public function category(){

        return $this-> belongsTo('App\Model\Category');

    }
}
