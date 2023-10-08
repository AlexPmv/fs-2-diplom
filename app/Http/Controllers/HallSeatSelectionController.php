<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Showtime;
use App\Models\Hall;
use Illuminate\Http\Request;

class HallSeatSelectionController extends Controller
{
    public function getHallConfiguration($showtimeId, $selectedDate)
    {
        $showtime = Showtime::find($showtimeId);
        return view('client.hall', ['showtime' => $showtime, 'selectedDate' => $selectedDate]);
    }
}
