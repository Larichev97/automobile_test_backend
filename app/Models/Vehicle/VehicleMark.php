<?php

namespace App\Models\Vehicle;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleMark extends Model
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
    protected $table = 'vehicle_marks';

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
        return $this->hasMany(Vehicle::class, 'mark_id', 'id');
    }

    /**
     * @return array
     */
    public static function getMarksItemsList() : array
    {
        $marks = self::all();

        $mark_items = [];

        if (!empty($marks)) {
            foreach ($marks as $mark) {
                $mark_items[$mark->id] = $mark->name;
            }
        }

        return $mark_items;
    }
}
