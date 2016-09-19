<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;

use App\Http\Requests;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        //return 'I am in Index';

        $vehicles = Vehicle::all();

        return response()->json(['data' => $vehicles], 200);



    }

}