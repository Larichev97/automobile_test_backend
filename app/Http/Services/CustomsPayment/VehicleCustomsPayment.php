<?php

namespace App\Http\Services\CustomsPayment;

use App\Models\Vehicle\Vehicle;
use Carbon\Carbon;

class VehicleCustomsPayment implements CustomsPaymentInterface
{

    /**
     * @var Vehicle
     */
    private $vehicle;

    private $delivery_price; // "D"
    private $exchange_rate; // "X"
    private $vehicle_price; // "P"
    private $fuel; // "F"
    private $engine_volume; // "V"
    private $production_year; // "Y"

    /**
     * @param Vehicle $vehicle
     * @param $delivery_price
     * @param $exchange_rate
     */
    public function __construct(Vehicle $vehicle, $delivery_price, $exchange_rate)
    {
        $this->vehicle = $vehicle;
        $this->delivery_price = $delivery_price;
        $this->exchange_rate = $exchange_rate;
    }

    /**
     * @return array
     */
    public function calculateCustomsPayment() :array
    {
        $this->setOptions();

        // Акциз
        $excise = (($this->calculateFuelCoefficient() * $this->calculateVehicleAgeCoefficient() * $this->getEngineVolume()) / 1000) * $this->exchange_rate;

        // Ввозная пошлина
        $import_duty = $this->calculateDeclaredValue() * 0.1;

        // НДС
        $vat = ($excise + $import_duty + $this->calculateDeclaredValue()) * 0.2;

        return [
            'excise' => $excise,
            'import_duty' => $import_duty,
            'vat' => $vat
        ];
    }

    /**
     * @return void
     */
    private function setVehiclePrice()
    {
        $this->vehicle_price = $this->vehicle->price;
    }

    /**
     * @return mixed
     */
    private function getVehiclePrice()
    {
        return $this->vehicle_price;
    }

    /**
     * @return void
     */
    private function setFuel()
    {
        $this->fuel = (int) $this->vehicle->fuel_type_id;
    }

    /**
     * @return int
     */
    private function getFuel() :int
    {
        return $this->fuel;
    }

    /**
     * @return void
     */
    private function setEngineVolume()
    {
        $this->engine_volume = $this->vehicle->engine_volume;
    }

    /**
     * @return mixed
     */
    private function getEngineVolume()
    {
        return $this->engine_volume;
    }

    /**
     * @return void
     */
    private function setProductionYear()
    {
        $this->production_year = (int) Carbon::parse($this->vehicle->production_date)->format('Y');
    }

    private function getProductionYear()
    {
        return $this->production_year;
    }

    /**
     *  "R"
     *
     * @return mixed
     */
    private function calculateDeclaredValue()
    {
        $r = $this->getVehiclePrice() + $this->delivery_price;

        return $r;
    }

    /**
     *  "K"
     *
     * @return int
     */
    private function calculateVehicleAgeCoefficient() : int
    {
        $last_year = (int) Carbon::now()->subYear()->format('Y');

        $y = $this->getProductionYear();

        $k = $last_year - $y;

        if ($k > 15) {
            $k = 15;
        }

        return $k;
    }

    /**
     *  "L"
     *
     * @return int
     */
    private function calculateFuelCoefficient() :int
    {
        $l = 0;

        if ($this->vehicle::FUEL_DIESEL === $this->getFuel()) {
            if ($this->getEngineVolume() > 3500) {
                $l = 150;
            } else {
                $l = 75;
            }
        }

        if ($this->vehicle::FUEL_GASOLINE === $this->getFuel()) {
            if ($this->getEngineVolume() > 3000) {
                $l = 100;
            } else {
                $l = 50;
            }
        }

        return $l;
    }

    /**
     * @return void
     */
    private function setOptions()
    {
        $this->setVehiclePrice();
        $this->setFuel();
        $this->setEngineVolume();
        $this->setProductionYear();
    }


}
