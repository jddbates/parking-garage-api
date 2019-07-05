<?php

namespace App\Http\Controllers;

use App\Rate;
use Illuminate\Http\Request;
use App\Http\Resources\RateCollection;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new RateCollection(Rate::all());
    }

}
