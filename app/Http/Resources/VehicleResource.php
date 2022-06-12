<?php

namespace App\Http\Resources;

use App\Models\Delivery\DeliveryPrice;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
{
    /**
     *  Fields for Frontend
     *
     * @param $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'vin' => $this->vin,
            'engine_volume' => $this->engine_volume,
            'production_date' => Carbon::parse($this->production_date)->format('Y'),
            'price' => $this->price,

            'mark' => $this->vehicleMark,
            'model' => $this->vehicleModel,
            'fuel' => $this->vehicleFuelType,
            'importer_country' => $this->importerCountry,

            'delivery' => DeliveryPrice::all(),
        ];
    }
}
