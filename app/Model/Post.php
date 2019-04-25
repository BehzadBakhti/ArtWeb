<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Post extends Model
{

    use SoftDeletes;

    use Searchable;
    
    public function toSearchableArray()
    {
        $array = [
            'id'=>$this->id,
        'title'=>$this->title,
        'body'=>$this->body,
        
        ];
        // Customize array...

        return $array;
    }

    protected $fillable = [
        'title', 'body', 'category_id', 'featured', 'slug', 'is_published'
    ];

    public function getFeaturedAttribute($featured){

        return asset($featured);
    }

    public function category(){

        return $this-> belongsTo('App\Model\Category');

    }

    public function tags(){

        return $this->belongsToMany('App\Model\Tag');
    }
}
