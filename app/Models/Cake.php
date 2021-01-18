<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
    use HasFactory;
    protected $fillable = ['cake_name','cake_image','cake_description','cake_category_id','short_url','is_available','flavour_id','like_counts','ratings','is_veg','ip_address','created_by','is_best_seller'];
    
  
    // public function user()
    // {
    //     return $this->belongsTo(User::class)->select(array('id','name','email','phone'));
    // }
    
    // public function category()
    // {
    //     return $this->belongsTo(MasterCategory::class)->select(array('id'));
    // }

    // public function category()
    // {
    //     return $this->belongsTo(MasterCategory::class)->select(array('id'));
    // }
}
