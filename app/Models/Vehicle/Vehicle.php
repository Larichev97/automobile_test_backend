<?php

namespace App\Models\Vehicle;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'mark_id',
        'model_id',
        'vin',
        'fuel_type_id',
        'engine_volume',
        'production_date',
        'price',
        'importer_country_id',
    ];

    /**
     * @var string
     */
    protected $table = 'vehicles';

    /**
     * @var bool
     */
    protected $guarded = false;

    /**
     *  Vehicle fuel type connection
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function VehicleFuelType()
    {
        return $this->hasOne(VehicleFuelType::class, 'id', 'fuel_type_id');
    }

    /**
     *  Vehicle mark connection
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function VehicleMark()
    {
        return $this->hasOne(VehicleMark::class, 'id', 'mark_id');
    }

    /**
     *  Vehicle model connection
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function VehicleModel()
    {
        return $this->hasOne(VehicleModel::class, 'id', 'model_id');
    }

    /**
     *  Importer country connection
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ImporterCountry()
    {
        return $this->hasOne(ImporterCountry::class, 'id', 'importer_country_id');
    }

}
