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
        'start_time',
        'end_time',
    ];

    public function movie()
    {
        return $this->belongsTo('App\Models\Movie');
    }
    public function hall()
    {
        return $this->belongsTo('App\Models\Hall');
    }

    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket');
    }
}
