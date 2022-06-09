<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
    ];

    /**
     * @var string
     */
    protected $table = 'vehicle_models';

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
        return $this->hasMany(Vehicle::class, 'model_id', 'id');
    }
}
