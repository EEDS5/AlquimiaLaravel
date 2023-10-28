<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\ClientToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        //return $clients;
        return view('client.index', compact('clients'));
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'passwordSalt');

        $client = Client::where('email', $credentials['email'])->first();
    
        if ($client && Hash::check($credentials['passwordSalt'], $client->passwordSalt)) {
            session()->regenerate(); // Regenerar la sesión por seguridad
            session(['user_id' => $client->id]); // Almacenar el ID del usuario en la sesión
    
            return redirect('/dashboard');
        } else {
            return back()->with('error', 'Credenciales inválidas');
        }
    }

    public function logout()
    {
        session()->forget('user_id'); // Eliminar el ID de usuario de la sesión
        return redirect('/login')->with('success', 'Has cerrado sesión exitosamente.');
    }
    




    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
    {
        $client = new Client([
            'fullName' => $request->get('fullName'),
            'passwordSalt' => Hash::make($request->get('passwordSalt')),
            'passwordHash' => $request->get('passwordHash'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email')
        ]);

        $client->save();
        return redirect('/client')->with('success', 'Client saved!');
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
        return redirect('/client')->with('success', 'Client updated!');
    }

    public function dashboard()
    {
        if (session()->has('user_id')) {
            return view('dashboard');
        } else {
            return redirect('/login')->with('error', 'Inicia sesión para acceder al panel de control.');
        }
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect('/client')->with('success', 'Client deleted!');
    }
}
