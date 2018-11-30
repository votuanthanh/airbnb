<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        Auth::user()->reservations()->create([
            'room_id' => $request->room_id,
            'start_date' => date('Y-m-d', strtotime($request->start_date)),
            'end_date' => $request->end_date,
            'price' => $request->price,
            'total' => $request->total
        ]);

        $notification = array(
            'message' => 'Your Reservation created',
            'alert-type' => 'success'
        );

        return redirect()->route('rooms.show', $request->room_id)->with($notification);
    }

    public function your_reservations()
    {
        $rooms = Auth::user()->rooms;

        return view('reservations.your_reservations', compact('rooms'));
    }

    public function your_trips()
    {
        $trips = Auth::user()->reservations;

        return view('reservations.your_trips', compact('trips'));
    }

    public function show($id)
    {
        $reservation = Auth::user()->reservations()->where('id', $id)->first();
        $reservation->delete();

        return redirect('/your_reservations');
    }

    public function index()
    {
        $rooms = Auth::user()->rooms;

        return view('reservations.your_reservations', compact('rooms'));
    }

    public function destroy($id){
    }
}
