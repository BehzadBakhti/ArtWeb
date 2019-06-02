<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\product;
class Cargo extends Model
{
    protected $fillable =['user_id','delivery_date','status', 'address'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
}
