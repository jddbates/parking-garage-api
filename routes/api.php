<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Show Garage
Route::get('garage', 'GarageController@show');

// List Rates
Route::get('rates', 'RateController@index');

// List Tickets
Route::get('tickets', 'TicketController@index');

// List Single Ticket
Route::get('ticket/{id}', 'TicketController@show');

// Create New Ticket
Route::post('ticket', 'TicketController@store');

// Pay Ticket Balance
Route::put('ticket/{id}', 'TicketController@store');