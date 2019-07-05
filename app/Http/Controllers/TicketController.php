<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Garage;
use Illuminate\Http\Request;
use App\Http\Resources\TicketCollection;
use App\Http\Resources\Ticket as TicketResource;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new TicketCollection(Ticket::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $garage = Garage::first();
        if ($garage->available_spots <= 0) {
            return response()->json(['error' => 'No spaces available'], 422);
        }
        $ticket = new Ticket;
        $ticket->is_paid = 0;
        $ticket->garage_id = 1;

        if ($ticket->save()) {
            return new TicketResource($ticket);
        } else {
            return response()->json(['error' => 'Something went wrong, failed to create ticket'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new TicketResource(Ticket::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  integer $id
     * @param  integer $amount
     * @return \Illuminate\Http\Response
     */
    public function update($id, $amount)
    {
        $ticket = Ticket::findOrFail($id);
        if ($ticket->is_paid) {
            return response()->json(['error' => 'This ticket has already been paid'], 422);
        }

        if (number_format($amount/100, 2) >= $ticket->calculate_price() ) {
            // update ticket
            $ticket->is_paid = 1;
            if ($ticket->save()) {
                return new TicketResource($ticket);
            } else {
                return response()->json(['error' => 'Something went wrong, failed to update ticket'], 500);
            }
        } else {
            return response()->json(['error' => 'Failed to pay ticket, insufficient funds'], 422);
        }
    }

    /**
     * Delete the specified resource in storage.
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);

        if (!$ticket->is_paid) {
            return response()->json(['error' => 'You must pay your ticket before leaving'], 422);
        }

        if ($ticket->delete()) {
            return new TicketResource($ticket);
        } else {
            return response()->json(['error' => 'Something went wrong, failed to delete ticket'], 500);
        }
    }

}
