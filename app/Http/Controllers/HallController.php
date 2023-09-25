<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Http\Controllers\Controller;
use App\Models\HallConfig;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Validator;

class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        $hall->save();

        return redirect('admin');
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
    public function updateSeatCount(Request $request)
    {
        $request->validate(
            [
                'rows' => 'numeric|min:1|max:10',
                'seats' => 'numeric|min:1|max:10',
            ],
            [
                'rows' => 'Количество рядов должно быть от 1 до 10',
                'seats' => 'Количество мест должно быть от 1 до 10',
            ]
        );

        $hall = Hall::find($request->id);

        if ($hall) {
            $hall->rowCount = $request->rows;
            $hall->seatsCount = $request->seats;
            $result = $hall->save();

            if ($result) {
                $hallConfig = HallConfig::where('hall_id', $request->id)->get();
                
                if (!empty($hallConfig)) {
                    foreach ($hallConfig as $seat) {
                        $seat->delete();
                    };
                };
    
                for ($i = 1; $i < $request->rows + 1; $i++) {
                    for ($b = 1; $b < $request->seats + 1; $b++) {
                        (new HallConfigController)->store(['id' => $request->id, 'rows' => $i, 'seats' => $b]);
                    };
                };
            }
        }

        return redirect('admin');
    }
    public function updatePrice(Request $request)
    {
        $validator = FacadesValidator::make($request->all(), [
            'priceStandart' => 'numeric|min:100',
            'priceVip' => 'numeric|min:100',
        ], [
            'priceStandart' => 'Минимальная значение поля цена 1: 100',
            'priceVip' => 'Минимальная значение поля цена 2: 100',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()->all()]);
        };

        $hall = Hall::find($request->id);

        if ($hall) {
            $hall->priceStandart = $request->priceStandart;
            $hall->priceVip = $request->priceVip;
            $result = $hall->save();

            if ($result) {
                return response(json_encode('Цены успешно сохранены!'), 200)
                ->header('Content-Type', 'text/plain');
            }
        }
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
