<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Services\CustomsPayment\VehicleCustomsPayment;
use App\Models\Vehicle\Vehicle;
use Illuminate\Http\Request;


class CustomsPaymentController extends Controller
{
    /**
     *  Calculation of custom payment.
     */
    public function calculate(Request $request)
    {
        $vehicle = Vehicle::findOrFail($request->id);

        $delivery_price = $request->delivery_price;

        $exchange_rate = 1.0517; // (курc валют пары USD: EUR)

        $customs_payment = new VehicleCustomsPayment($vehicle, $delivery_price, $exchange_rate);

        //return \json_encode($customs_payment->calculateCustomsPayment());
        return response()->json([$customs_payment->calculateCustomsPayment(), 'Расчёт выполнен!']);
    }
}
