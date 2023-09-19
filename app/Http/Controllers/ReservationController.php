<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservation.index', compact('reservations'));
    }

    public function create()
    {
        return view('reservation.create');
    }

    public function store(Request $request)
    {
        $reservation = new Reservation([
            'clientId' => $request->get('clientId'),
            'servingTurnId' => $request->get('servingTurnId'),
            'slots' => $request->get('slots'),
            'confirmed' => $request->get('confirmed'),
            'confirmationEnableTime' => $request->get('confirmationEnableTime'),
            'confirmationEndTime' => $request->get('confirmationEndTime'),
            'note' => $request->get('note')
        ]);

        $reservation->save();
        return redirect('/reservations')->with('success', 'Reservation saved!');
    }

    public function show(Reservation $reservation)
    {
        return view('reservation.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        return view('reservation.edit', compact('reservation'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $reservation->clientId = $request->get('clientId');
        $reservation->servingTurnId = $request->get('servingTurnId');
        $reservation->slots = $request->get('slots');
        $reservation->confirmed = $request->get('confirmed');
        $reservation->confirmationEnableTime = $request->get('confirmationEnableTime');
        $reservation->confirmationEndTime = $request->get('confirmationEndTime');
        $reservation->note = $request->get('note');

        $reservation->save();
        return redirect('/reservations')->with('success', 'Reservation updated!');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect('/reservations')->with('success', 'Reservation deleted!');
    }
}
