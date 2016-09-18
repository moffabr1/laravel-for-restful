<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MyController extends Controller
{
    //

    public function index($name = 'user')
    {

        return view('hi', ['name' => $name]);

    }

}
