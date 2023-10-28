<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservationItem;

class ReservationItemController extends Controller
{
    public function index()
    {
        $reservationItems = ReservationItem::all();
        return view('reservationItem.index', ['reservationItems' => $reservationItems]);
    }

    public function create()
    {
        return view('reservationItem.create');
    }

    public function store(Request $request)
    {
        $reservationItem = ReservationItem::create($request->all());
        return redirect()->route('reservationItem.index');
    }

    public function show(string $id)
    {
        $reservationItem = ReservationItem::find($id);
        return view('reservationItem.show', ['reservationItem' => $reservationItem]);
    }

    public function edit(string $id)
    {
        $reservationItem = ReservationItem::find($id);
        return view('reservationItem.edit', ['reservationItem' => $reservationItem]);
    }

    public function update(Request $request, string $id)
    {
        $reservationItem = ReservationItem::find($id);
        $reservationItem->update($request->all());
        return redirect()->route('reservationItem.index');
    }

    public function destroy(string $id)
    {
        $reservationItem = ReservationItem::find($id);
        $reservationItem->delete();
        return redirect()->route('reservationItem.index');
    }

}
