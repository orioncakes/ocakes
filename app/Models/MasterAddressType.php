<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterAddressType extends Model
{
    use HasFactory;
    protected $fillable = ['address_type'];
    public $timestamps = false;

}
