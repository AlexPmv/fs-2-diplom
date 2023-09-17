<?php

namespace App\Http\Controllers;

use App\Models\HallConfig;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HallConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return HallConfig::all();
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
    public function store(array $newStoredHall)
    {
        $hallConfig = new HallConfig();
        $hallConfig->hall_id = $newStoredHall['hall_id'];
        $hallConfig->row = $newStoredHall['row'];
        $hallConfig->seat = $newStoredHall['seat'];
        $hallConfig->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(HallConfig $hallConfig)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HallConfig $hallConfig)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HallConfig $hallConfig)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HallConfig $hallConfig)
    {
        //
    }
}
