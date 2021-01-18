<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CakeWeight extends Model
{
    use HasFactory;
    protected $fillable = ['cake_id','weight_id','supplier_id'];
    public $timestamps = false;

    public function cake()
    {
        return $this->belongsTo(Cake::class);
    }
    // public function cakes()
    // {
    //   return $this->hasMany(Cake::class);
    // }

    // public function cake_weights()
    // {
    //   return $this->hasMany(MasterCakeWeight::class);
    // }

    // public function seller()
    // {
    //   return $this->hasMany(Seller::class);
    // }

    
   
}
