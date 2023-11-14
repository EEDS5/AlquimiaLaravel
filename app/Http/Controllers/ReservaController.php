<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\Persona;
use App\Models\Entrada;
use App\Models\Pago;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        
        return view('dashboard');


        // $reservas = Reserva::with(['cliente', 'persona', 'entrada', 'pago'])->get();
        // return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        // Aquí deberás cargar las relaciones necesarias para el formulario de creación
        return view('reservas.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'persona_id' => 'required|exists:personas,id',
            'entrada_id' => 'nullable|exists:entradas,id',
            'pago_id' => 'nullable|exists:pagos,id',
            'fecha' => 'required|date',
            'monto' => 'required|numeric',
            'cantidad_cupo' => 'required|integer',
            'estado' => 'required', // Validar según los valores de tu enum
        ]);

        Reserva::create($validatedData);
        return redirect('/reservas')->with('success', 'Reserva creada con éxito.');
    }

    public function show(Reserva $reserva)
    {
        return view('reservas.show', compact('reserva'));
    }

    public function edit(Reserva $reserva)
    {
        // Cargar las relaciones necesarias para el formulario de edición
        return view('reservas.edit', compact('reserva'));
    }

    public function update(Request $request, Reserva $reserva)
    {
        $validatedData = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'persona_id' => 'required|exists:personas,id',
            'entrada_id' => 'nullable|exists:entradas,id',
            'pago_id' => 'nullable|exists:pagos,id',
            'fecha' => 'required|date',
            'monto' => 'required|numeric',
            'cantidad_cupo' => 'required|integer',
            'estado' => 'required', // Validar según los valores de tu enum
        ]);

        $reserva->update($validatedData);
        return redirect('/reservas')->with('success', 'Reserva actualizada con éxito.');
    }

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();
        return redirect('/reservas')->with('success', 'Reserva eliminada con éxito.');
    }

    public function __construct()
    {
        $this->middleware(['auth']);
    }

   
}
