<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;
    protected $fillable = ['seller_name','seller_mobile_no','seller_shop_name','seller_address','seller_city','seller_state','seller_pincode','seller_lat','seller_long','ip_address','user_id','is_active','is_open'];
    
  
    public function user()
    {
        return $this->belongsTo(User::class)->select(array('id','name','email','phone'));
    }

    // public function cake_weight()
    // {
    //   return $this->belongsTo(CakeWeight::class);
    // }


}
