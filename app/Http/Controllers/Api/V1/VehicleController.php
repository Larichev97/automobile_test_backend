<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\VehicleResource;
use App\Models\Vehicle\Vehicle;
use Illuminate\Http\Request;


class VehicleController extends Controller
{
    /**
     *  Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $query = Vehicle::all();

        return response()->json([VehicleResource::collection($query), 'OK!']);
    }

    /**
     *  Display the specified resource.
     *
     * @param Vehicle $vehicle
     * @return VehicleResource
     */
    public function show(Vehicle $vehicle)
    {
        return new VehicleResource($vehicle);
    }

}
