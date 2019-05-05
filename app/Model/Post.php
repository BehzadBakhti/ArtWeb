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
        'title', 'body', 'category_id', 'user_id', 'featured','read_count', 'slug', 'is_published'
    ];

    public function getFeaturedAttribute($featured){

        return asset($featured);
    }

    public function category(){

        return $this-> belongsTo('App\Model\Category');

    }

    public function user(){

        return $this-> belongsTo('App\User');

    }


    public function comments(){
        return $this->hasMany('App\Model\Comment');

    }

    public function tags(){

        return $this->belongsToMany('App\Model\Tag');
    }
}
