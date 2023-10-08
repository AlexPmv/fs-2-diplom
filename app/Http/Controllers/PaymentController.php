<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function indexPayment($hallConfigIdData, $selectedDate)
    {
        return view('client.payment', ['hallConfigIdData' => $hallConfigIdData, 'selectedDate' => $selectedDate]);
    }
}
