<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable=['event_title', 'featured_image', 'link','detail','active'];
}
