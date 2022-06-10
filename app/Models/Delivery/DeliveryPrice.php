<?php

namespace App\Models\Delivery;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryPrice extends Model
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
        'country_name',
        'price',
    ];

    /**
     * @var string
     */
    protected $table = 'delivery_prices';

    /**
     * @var bool
     */
    protected $guarded = false;


    /**
     * @return array
     */
    public static function getDeliveryCountryPriceItemsList() : array
    {
        $countries = self::all();

        $country_price_items = [];

        if (!empty($countries)) {
            foreach ($countries as $country) {
                $country_price_items[$country->id] = $country->country_name . '(' . $country->price . ')';
            }
        }

        return $country_price_items;
    }
}
