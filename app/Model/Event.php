<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable=['event_title', 'featured_image', 'category_id','detail','is_main','active'];
}
