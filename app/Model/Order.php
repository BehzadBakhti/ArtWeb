<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Address;
use App\Model\Product;
use App\User;

class Order extends Model
{
    public function address(){
        return $this->belongsTo(Address::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
    protected $fillable=['user_id', 'address_id', 'total','status','error'];
    
}
