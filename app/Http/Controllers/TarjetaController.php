<?php

namespace App\Http\Controllers;

use App\Models\Tarjeta;
use App\Models\Cliente;
use Illuminate\Http\Request;

class TarjetaController extends Controller
{
     // Muestra una lista de todas las tarjetas.
     public function index()
     {
         $tarjetas = Tarjeta::with('cliente')->get();
         return view('tarjetas.index', compact('tarjetas'));
     }
 
     // Muestra el formulario para crear una nueva tarjeta.
     public function create()
     {
         $clientes = Cliente::all(); // Suponiendo que necesitas seleccionar un cliente al crear una tarjeta.
         return view('tarjetas.create', compact('clientes'));
     }
 
     // Almacena una nueva tarjeta en la base de datos.
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'cliente_id' => 'required|exists:clientes,id',
             'nroTarjeta' => 'required|unique:tarjetas|max:50',
             'entidadBancaria' => 'required|max:50',
             'fechaVencimiento' => 'required|date',
         ]);
 
         Tarjeta::create($validatedData);
         return redirect('/tarjetas')->with('success', 'Tarjeta creada con éxito.');
     }
 
     // Muestra una tarjeta específica.
     public function show(Tarjeta $tarjeta)
     {
         return view('tarjetas.show', compact('tarjeta'));
     }
 
     // Muestra el formulario para editar una tarjeta existente.
     public function edit(Tarjeta $tarjeta)
     {
         $clientes = Cliente::all();
         return view('tarjetas.edit', compact('tarjeta', 'clientes'));
     }
 
     // Actualiza una tarjeta en la base de datos.
     public function update(Request $request, Tarjeta $tarjeta)
     {
         $validatedData = $request->validate([
             'cliente_id' => 'required|exists:clientes,id',
             'nroTarjeta' => 'required|unique:tarjetas,nro_tarjeta,' . $tarjeta->id . '|max:50',
             'entidadBancaria' => 'required|max:50',
             'fechaVencimiento' => 'required|date',
         ]);
 
         $tarjeta->update($validatedData);
         return redirect('/tarjetas')->with('success', 'Tarjeta actualizada con éxito.');
     }
 
     // Elimina una tarjeta de la base de datos.
     public function destroy(Tarjeta $tarjeta)
     {
         $tarjeta->delete();
         return redirect('/tarjetas')->with('success', 'Tarjeta eliminada con éxito.');
     }
}
