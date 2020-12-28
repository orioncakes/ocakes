<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterCategory extends Model
{
    use HasFactory;
    protected $fillable = ['category_name'];
    public $timestamps = false;
    protected $table="master_categories";
}
