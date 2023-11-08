<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Persona;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'persona_id' => 'required|exists:personas,id',
            'fecha_registro' => 'required|date',
            'razon_social' => 'nullable|max:50',
            'estado' => 'required|boolean'
        ]);

        Cliente::create($validatedData);
        return redirect('/clientes')->with('success', 'Cliente creado correctamente.');
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $validatedData = $request->validate([
            'persona_id' => 'required|exists:personas,id',
            'fecha_registro' => 'required|date',
            'razon_social' => 'nullable|max:50',
            'estado' => 'required|boolean'
        ]);

        $cliente->update($validatedData);
        return redirect('/clientes')->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect('/clientes')->with('success', 'Cliente eliminado correctamente.');
    }
}
