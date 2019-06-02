<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Brand;
use App\User;

class Vendor extends Model
{
    public function brands(){
        return $this->hasMany(Brand::class);
     }

     public function user(){
        return $this->belongsTo(User::class);
     }

     protected $fillable =['name','type','national_id', 'economic_code', 'account_owner', 'account_sheba', 'mobile_no', 'phone_no', 'status'];

   
}
