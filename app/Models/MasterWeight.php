<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterWeight extends Model
{
    use HasFactory;
    protected $fillable = ['kgs','amount'];
    public $timestamps = false;

}
