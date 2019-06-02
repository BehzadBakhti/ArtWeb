<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Address extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    protected $fillable=['user_id', 'province', 'city','sub_address', 'postal_code'];

}
