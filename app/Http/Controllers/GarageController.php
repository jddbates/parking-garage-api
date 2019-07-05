<?php

namespace App\Http\Controllers;

use App\Garage;
use Illuminate\Http\Request;
use App\Http\Resources\Garage as GarageResource;

class GarageController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Garage  $garage
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return new GarageResource(Garage::find(1));
    }
}
