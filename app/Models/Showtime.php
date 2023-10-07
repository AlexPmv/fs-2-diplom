<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'hall_id',
        'movie_name',
        'time',
    ];

    public function movie()
    {
        return $this->belongsTo('App\Models\Movie');
    }
}
