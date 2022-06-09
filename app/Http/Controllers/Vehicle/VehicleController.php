<?php

namespace App\Http\Controllers\Vehicle;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Models\Vehicle\Vehicle;

class VehicleController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $vehicles = Vehicle::all();

        return view('vehicle.index', compact('vehicles'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('vehicle.create');
    }

    /**
     * @param Vehicle $vehicle
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Vehicle $vehicle)
    {
        return view('vehicle.show', compact('vehicle'));
    }

    /**
     * @param Vehicle $vehicle
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Vehicle $vehicle)
    {
        return view('vehicle.edit', compact('vehicle'));
    }


    /**
     * @param UpdateVehicleRequest $request
     * @param Vehicle $vehicle
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        $data = $request->validated();

        $vehicle->update($data);

        //return view('vehicle.show', compact('vehicle'));
        return redirect()->route('vehicle.index');
    }

    /**
     * @param StoreVehicleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreVehicleRequest $request)
    {
        $date = $request->validated();

        Vehicle::firstOrCreate($date);

        return redirect()->route('vehicle.index');
    }

    /**
     * @param Vehicle $vehicle
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect()->route('vehicle.index');
    }
}
