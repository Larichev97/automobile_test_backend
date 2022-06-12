<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomsPayment\StoreCustomsPaymentRequest;
use App\Http\Services\CustomsPayment\VehicleCustomsPayment;
use Illuminate\Http\Request;


class CustomsPaymentController extends Controller
{
    /**
     *  Calculation of customs payment.
     *
     * @param StoreCustomsPaymentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function calculate(StoreCustomsPaymentRequest $request): \Illuminate\Http\JsonResponse
    {
        $exchange_rate = 1.05; // (курc валют пары USD: EUR)

        $customs_payment = new VehicleCustomsPayment(
            $request->fuel_type_id,
            $request->engine_volume,
            $request->production_year,
            $request->vehicle_price,
            $request->delivery_price,
            $exchange_rate
        );

        return response()->json($customs_payment->calculateCustomsPayment());
    }
}
