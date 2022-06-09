<?php

namespace App\Models\Vehicle;

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

    /**
     * @return array
     */
    public static function getModelsItemsList() : array
    {
        $models = self::all();

        $models_items = [];

        if (!empty($models)) {
            foreach ($models as $model) {
                $models_items[$model->id] = $model->name;
            }
        }

        return $models_items;
    }
}
