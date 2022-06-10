<?php

namespace App\Http\Requests\Vehicle;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleRequest extends FormRequest
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
            'mark_id' => 'required|integer',
            'model_id' => 'required|integer',
            'vin' => 'required|max:255',
            'fuel_type_id' => 'required|integer',
            'engine_volume' => 'required|max:255',
            'production_date' => 'date_format:Y-m-d',
            'price' => 'required|numeric|min:0',
            'importer_country_id' => 'required|integer',
        ];
    }
}
