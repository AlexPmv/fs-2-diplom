<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd((new HallConfigController)->index());
        // dd(Hall::all());
        $data = Hall::all();
        return view('admin.index', ['data' => $data]);
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
                'name' => 'bail|unique:halls',
            ],
            [
                'name.unique' => 'Такое имя зала уже используется, введите другое',
            ]
        );

        $hall = new Hall;
        $hall->name = $request->name;
        $result = $hall->save();

        if ($result) {
            $newStoredHall = Hall::where('name', $request->name)->first(['id', 'rowCount', 'seatsCount'])->toArray();

            for ($i = 1; $i < $newStoredHall['rowCount'] + 1; $i++) {
                for ($b = 1; $b < $newStoredHall['seatsCount'] + 1; $b++) {
                    (new HallConfigController)->store(['hall_id' => $newStoredHall['id'], 'row' => $i, 'seat' => $b]);
                };
            };
        }
        
        return redirect('admin');
    }

    protected function createHallConfig(string $name) {

    }

    /**
     * Display the specified resource.
     */
    public function show(Hall $hall)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hall $hall)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hall $hall)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hall = Hall::find($id);
        $hall->delete();
        return redirect('admin');
    }
}
