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

    public function loginPost(Request $request)
    {
        $email = $request->get('email');
        $passwordSalt = $request->get('passwordSalt');
    
        // Busca al usuario en la base de datos por su email
        $client = Client::where('email', $email)->first();
    
        // Si el usuario no existe, devuelve un error
        if (!$client) {
            return redirect('/login')->with('error', 'Invalid email or password');
        }
    
        // Verifica si la contraseña es correcta
        if (!Hash::check($passwordSalt, $client->passwordHash)) {
            return redirect('/login')->with('error', 'Invalid email or password');
        }
    
        // Guarda al usuario en la sesión
        session(['client' => $client]);
    
        // Agregar un dd para verificar el usuario autenticado
        dd($client);
    
        // Redirige al usuario al dashboard
        return redirect()->route('dashboard'); // Debes usar la ruta con nombre que definiste
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
        return view('dashboard'); // Aquí debes especificar la vista que quieres mostrar en el panel de control.
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect('/client')->with('success', 'Client deleted!');
    }
}
