<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CakeWeight extends Model
{
    use HasFactory;
    protected $fillable = ['cake_id','weight_id','supplier_id'];
    public $timestamps = false;

}
