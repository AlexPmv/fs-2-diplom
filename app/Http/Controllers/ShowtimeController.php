<?php

namespace App\Http\Controllers;

use App\Models\Showtime;
use App\Models\Movie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowtimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'hall_id' => 'required|numeric',
                'movie_id' => 'required|numeric',
                'start_time' => 'required|string',
            ],
            [
                'hall_id.required' => 'id зала не заполнено',
                'hall_id.numeric' => 'id зала должно быть числом',
                'movie_id.required' => 'id фильма не заполнено',
                'movie_id.numeric' => 'id фильма должно быть числом',
                'start_time.required' => 'Время начала сеанса не заполнено',
                'start_time.string' => 'Время время сеанса в нужной формате',
            ]
        );

        $showtime = new Showtime();
        $showtime->hall_id = $request['hall_id'];
        $showtime->movie_id = $request['movie_id'];
        $showtime->start_time = $request['start_time'];
        $showtime->movie_name = Movie::find($request['movie_id'])->name;
        $showtime->save();
        return redirect('admin')->withFragment('#showtime-section');
    }

    /**
     * Display the specified resource.
     */
    public function show(Showtime $showtime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Showtime $showtime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Showtime $showtime)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $showtime = Showtime::find($request['id']);
        $showtime->delete();
        return redirect('admin')->withFragment('#showtime-section');

    }
}
