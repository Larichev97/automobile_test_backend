<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVehicleRequest extends FormRequest
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
            'price' => 'required|numeric',
            'importer_country_id' => 'required|integer',
        ];
    }
}
