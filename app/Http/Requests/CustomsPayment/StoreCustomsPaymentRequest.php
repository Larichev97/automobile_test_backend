<?php

namespace App\Http\Requests\CustomsPayment;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomsPaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fuel_type_id' => 'required|max:255',
            'engine_volume' => 'required|numeric|min:0',
            'production_year' => 'required|date_format:Y-m-d',
            'vehicle_price' => 'required|numeric|min:0',
            'delivery_price' => 'required|numeric|min:0',
        ];
    }
}
