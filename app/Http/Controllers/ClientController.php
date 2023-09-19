<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\ClientToken;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return $clients;
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
    {
        $client = new Client([
            'fullName' => $request->get('fullName'),
            'passwordSalt' => $request->get('passwordSalt'),
            'passwordHash' => $request->get('passwordHash'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email')
        ]);

        $client->save();
        return redirect('/clients')->with('success', 'Client saved!');
    }

    public function show(Client $client)
    {
        return view('client.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('client.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $client->fullName = $request->get('fullName');
        $client->passwordSalt = $request->get('passwordSalt');
        $client->passwordHash = $request->get('passwordHash');
        $client->phone = $request->get('phone');
        $client->email = $request->get('email');

        $client->save();
        return redirect('/clients')->with('success', 'Client updated!');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect('/clients')->with('success', 'Client deleted!');
    }
}
