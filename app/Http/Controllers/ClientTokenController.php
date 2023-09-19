<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientToken;

class ClientTokenController extends Controller
{
    public function index()
    {
        $clientTokens = ClientToken::all();
        return view('clienttoken.index', compact('clientTokens'));
    }

    public function create()
    {
        return view('clienttoken.create');
    }

    public function store(Request $request)
    {
        $clientToken = new ClientToken([
            'id' => $request->get('id'),
            'expiration' => $request->get('expiration'),
            'clientId' => $request->get('clientId')
        ]);

        $clientToken->save();
        return redirect('/clienttokens')->with('success', 'Client Token saved!');
    }

    public function show(ClientToken $clientToken)
    {
        return view('clienttoken.show', compact('clientToken'));
    }

    public function edit(ClientToken $clientToken)
    {
        return view('clienttoken.edit', compact('clientToken'));
    }

    public function update(Request $request, ClientToken $clientToken)
    {
        $clientToken->id = $request->get('id');
        $clientToken->expiration = $request->get('expiration');
        $clientToken->clientId = $request->get('clientId');

        $clientToken->save();
        return redirect('/clienttokens')->with('success', 'Client Token updated!');
    }

    public function destroy(ClientToken $clientToken)
    {
        $clientToken->delete();
        return redirect('/clienttokens')->with('success', 'Client Token deleted!');
    }
}
