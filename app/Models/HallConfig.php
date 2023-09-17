<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HallConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'hall_id',
        'row',
        'seat',
        'status',
    ];
}
