<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientNote;

class ClientNoteController extends Controller
{
    public function index()
    {
        $clientNotes = ClientNote::all();
        return view('clientnote.index', compact('clientNotes'));
    }

    public function create()
    {
        return view('clientnote.create');
    }

    public function store(Request $request)
    {
        $clientNote = new ClientNote([
            'reservationId' => $request->get('reservationId'),
            'note' => $request->get('note')
        ]);

        $clientNote->save();
        return redirect('/clientnotes')->with('success', 'Client Note saved!');
    }

    public function show(ClientNote $clientNote)
    {
        return view('clientnote.show', compact('clientNote'));
    }

    public function edit(ClientNote $clientNote)
    {
        return view('clientnote.edit', compact('clientNote'));
    }

    public function update(Request $request, ClientNote $clientNote)
    {
        $clientNote->reservationId = $request->get('reservationId');
        $clientNote->note = $request->get('note');

        $clientNote->save();
        return redirect('/clientnotes')->with('success', 'Client Note updated!');
    }

    public function destroy(ClientNote $clientNote)
    {
        $clientNote->delete();
        return redirect('/clientnotes')->with('success', 'Client Note deleted!');
    }
}
