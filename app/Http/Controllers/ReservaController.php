<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\Persona;
use App\Models\Entrada;
use App\Models\Pago;
use App\Models\GestionMenu;
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
    // Validar los datos de la persona
    $datosPersona = $request->validate([
        'persona.nombre' => 'required|string|max:60',
        'persona.apellido_p' => 'required|string|max:30',
        'persona.apellido_m' => 'required|string|max:30',
        'persona.ci' => 'required|string|max:30|unique:personas,ci',
        'persona.email' => 'required|email|max:30|unique:personas,email',
        'persona.telefono' => 'required|string|max:30|unique:personas,telefono',
    ]);

    // Crear la persona
    $persona = Persona::create([
        'tipo_persona_id' => 1, // Valor predeterminado porque cada usuario que realiza una reserva se convierte en Cliente
        'nombre' => $datosPersona['persona']['nombre'],
        'apellido_p' => $datosPersona['persona']['apellido_p'],
        'apellido_m' => $datosPersona['persona']['apellido_m'],
        'ci' => $datosPersona['persona']['ci'],
        'email' => $datosPersona['persona']['email'],
        'telefono' => $datosPersona['persona']['telefono'],
        'estado' => true,
    ]);

    // Crear el cliente a partir de la persona
    $cliente = new Cliente;
    $cliente->id = $persona->id; // El id de la persona es el mismo que el del cliente
    $cliente->save();

    // Validar los datos de la reserva
    $datosReserva = $request->validate([
        'reserva.gestion_menu_id' => 'required|exists:gestion_menus,id',
        'reserva.fecha' => 'required|date|after_or_equal:today',
        'reserva.cantidad_cupo' => 'required|integer|min:1',
        // Añadir validaciones para otros campos si es necesario
    ]);

    // Crear la reserva
    $reserva = new Reserva([
        'cliente_id' => $cliente->id,
        'persona_id' => $persona->id,
        'gestion_menu_id' => $datosReserva['reserva']['gestion_menu_id'],
        'fecha' => $datosReserva['reserva']['fecha'],
        'cantidad_cupo' => $datosReserva['reserva']['cantidad_cupo'],
        'estado' => 'P', // Estado predeterminado en "Pendiente"
        // Agrega cualquier otro campo necesario
    ]);
    $reserva->save();

    \Log::info('Request data:', $request->all());

    return response()->json(['message' => 'Reserva creada con éxito', 'reserva' => $reserva], 201);
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
        return redirect('/reserva')->with('success', 'Reserva actualizada con éxito.');
    }

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();
        return redirect('/reserva')->with('success', 'Reserva eliminada con éxito.');
    }
}
