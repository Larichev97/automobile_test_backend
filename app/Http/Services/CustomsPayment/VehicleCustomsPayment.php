<?php

namespace App\Http\Services\CustomsPayment;

use App\Models\Vehicle\VehicleFuelType;
use Carbon\Carbon;

class VehicleCustomsPayment implements CustomsPaymentInterface
{
    private $fuel; // "F"
    private $engine_volume; // "V"
    private $production_year; // "Y"
    private $vehicle_price; // "P"
    private $delivery_price; // "D"
    private $exchange_rate; // "X"

    /**
     * @param int $fuel
     * @param $engine_volume
     * @param $production_year
     * @param $vehicle_price
     * @param $delivery_price
     * @param $exchange_rate
     */
    public function __construct(int $fuel, $engine_volume, $production_year, $vehicle_price, $delivery_price, $exchange_rate)
    {
        $this->fuel = $fuel;
        $this->engine_volume = $engine_volume;
        $this->production_year = (int) Carbon::parse($production_year)->format('Y');
        $this->vehicle_price = $vehicle_price;
        $this->delivery_price = $delivery_price;
        $this->exchange_rate = $exchange_rate;
    }

    /**
     * @return array
     */
    public function calculateCustomsPayment() :array
    {
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
     * @return mixed
     */
    private function getVehiclePrice()
    {
        return $this->vehicle_price;
    }

    /**
     * @return int
     */
    private function getFuel() :int
    {
        return $this->fuel;
    }

    /**
     * @return mixed
     */
    private function getEngineVolume()
    {
        return $this->engine_volume;
    }

    /**
     * @return int
     */
    private function getProductionYear(): int
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
        return $this->getVehiclePrice() + $this->delivery_price;
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

        if (VehicleFuelType::FUEL_DIESEL === $this->getFuel()) {
            $l = ($this->getEngineVolume() > 3500) ? 150 : 75;
        }

        if (VehicleFuelType::FUEL_GASOLINE === $this->getFuel()) {
            $l = ($this->getEngineVolume() > 3000) ? 100 : 50;
        }

        return $l;
    }

}
