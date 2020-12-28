<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterFlavour extends Model
{
    use HasFactory;
    protected $fillable = ['flavour_name'];
    public $timestamps = false;

}
