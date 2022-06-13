<?php

namespace App\Models\Delivery;

use App\Models\Vehicle\Vehicle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImporterCountry extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'price',
    ];

    /**
     * @var string
     */
    protected $table = 'importer_countries';

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
        return $this->hasMany(Vehicle::class, 'importer_country_id', 'id');
    }

    /**
     * @return array
     */
    public static function getImporterCountryItemsList() : array
    {
        $countries = self::all();

        $country_items = [];

        if (!empty($countries)) {
            foreach ($countries as $country) {
                $country_items[$country->id] = $country->name . ' (' . $country->price . ')';
            }
        }

        return $country_items;
    }
}
