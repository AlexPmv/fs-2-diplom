<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'showtime_id',
        'hall',
        'movie',
        'row',
        'seat',
        'date',
        'time',
    ];
}