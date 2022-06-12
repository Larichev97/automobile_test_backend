<?php

namespace App\Models\Vehicle;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleFuelType extends Model
{
    use HasFactory;


    const FUEL_DIESEL = 1;
    const FUEL_GASOLINE = 2;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
    ];

    /**
     * @var string
     */
    protected $table = 'vehicle_fuel_types';

    /**
     * @var bool
     */
    protected $guarded = false;


    /**
     *  Vehicles connection
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Vehicles()
    {
        return $this->hasMany(Vehicle::class, 'fuel_type_id', 'id');
    }

    /**
     * @return array
     */
    public static function getFuelsItemsList() : array
    {
        $fuels = self::all();

        $fuel_items = [];

        if (!empty($fuels)) {
            foreach ($fuels as $fuel) {
                $fuel_items[$fuel->id] = $fuel->name;
            }
        }

        return $fuel_items;
    }
}
