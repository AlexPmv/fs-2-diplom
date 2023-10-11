<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Showtime;
use App\Models\HallConfig;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function indexPayment($hallConfigIdData, $sum, $showtimeId, $selectedDate)
    {
        $paymentData = [];
        $seats = [];

        foreach (explode('&', $hallConfigIdData) as $hallConfigId) {
            $seat = HallConfig::find($hallConfigId);
            $seats[] = "$seat->seat место ($seat->row ряд)";
        }

        $paymentData['movieName'] = Showtime::find($showtimeId)->movie->name;
        $paymentData['hallName'] = Showtime::find($showtimeId)->hall->name;
        $paymentData['showtimeId'] = $showtimeId;
        $paymentData['hallConfigIdData'] = $hallConfigIdData;
        $paymentData['seats'] = join(', ', $seats);
        $paymentData['startTime'] = Showtime::find($showtimeId)->start_time;
        $paymentData['sum'] = $sum;
        $paymentData['selectedDate'] = $selectedDate;

        return view('client.payment', ['paymentData' => $paymentData]);
    }
}
