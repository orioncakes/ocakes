<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterTimeSlot extends Model
{
    use HasFactory;
    protected $fillable = ['time_slot','is_available'];
    public $timestamps = false;

}
