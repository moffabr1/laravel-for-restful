<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMakerRequest;
use App\Http\Requests\CreateVehicleRequest;
use App\Maker;
use App\Vehicle;
use Illuminate\Http\Request;

use App\Http\Requests;

class MakerVehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        //return "Showing the vehicles of $id";

        $maker = Maker::find($id);

        if(!$maker)
        {
            return response()->json(['message' => 'This Maker does not exist', 'code' => 404], 404);
        }

        return response()->json(['data' => $maker->vehicles], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVehicleRequest $request, $makerId)
    {
        //

        $maker = Maker::find($makerId);

        if(!$maker)
        {
            return response()->json(['message' => 'This Maker does not exist', 'code' => 404], 404);
        }

        $values = $request->all();

        $maker->vehicles()->create($values);

        return response()->json(['message' => 'The vehivle associated was created'], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $vehicleId)
    {
        //

        //return "In the show " . $id . "-" . $vehicleId;
        //return $vehicleId;

        $maker = Maker::find($id);
        //return $maker;
        //return $maker->vehicles;

        //return "return " . $maker->vehicles->find($vehicleId);

        if(!$maker)
        {
            return response()->json(['message' => 'This Maker does not exist', 'code' => 404], 404);
        }

        $vehicle = $maker->vehicles->find($vehicleId);

        if(!$vehicle)
        {

            return response()->json(['message' => 'This Vehicle does not exist for this Maker', 'code' => 404], 404);

        }

        return response()->json(['data' => $vehicle], 200);


    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateVehicleRequest $request, $makerId, $vehicleId)
    {
        //

        $maker = Maker::find($makerId);

        if(!$maker)
        {
            return response()->json(['message' => 'This Maker does not exist', 'code' => 404], 404);
        }

        $vehicle = $maker->vehicles->find($vehicleId);

        if(!$vehicle)
        {
            return response()->json(['message' => 'This Vehicle does not exist', 'code' => 404], 404);
        }


        $color = $request->get('color');
        $power = $request->get('power');
        $capacity = $request->get('capacity');
        $speed = $request->get('speed');

        $vehicle->color = $color;
        $vehicle->power = $power;
        $vehicle->capacity = $capacity;
        $vehicle->speed = $speed;

        $vehicle->save();

        return response()->json(['message' => 'The Vehicle has been updated'], 200);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
