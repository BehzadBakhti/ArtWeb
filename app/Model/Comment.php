<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    protected $fillable=['post_id', 'user_name', 'email','body', 'qualified'];

    Public function post(){
        return $this-> belongsTo('App\Model\Post');
    }

    
}
