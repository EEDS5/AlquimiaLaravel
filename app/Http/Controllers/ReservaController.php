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
        'nombre' => $datosPersona['persona']['nombre'],
        'apellido_p' => $datosPersona['persona']['apellido_p'],
        'apellido_m' => $datosPersona['persona']['apellido_m'],
        'ci' => $datosPersona['persona']['ci'],
        'email' => $datosPersona['persona']['email'],
        'telefono' => $datosPersona['persona']['telefono'],
    ]);

    // Validar los datos de la reserva
    $datosReserva = $request->validate([
        'reserva.gestion_menu_id' => 'required|exists:gestion_menus,id',
        'reserva.fecha' => 'required|date|after_or_equal:today',
        'reserva.cantidad_cupo' => 'required|integer|min:1',
    ]);

    // Crear la reserva
    $reserva = new Reserva([
        'gestion_menu_id' => $datosReserva['reserva']['gestion_menu_id'],
        'fecha' => $datosReserva['reserva']['fecha'],
        'cantidad_cupo' => $datosReserva['reserva']['cantidad_cupo'],
        'estado' => 'A', // Estado predeterminado, por ejemplo, 'Activo'
    ]);
    $reserva->persona_id = $persona->id;
    // Asignar 'cliente_id' si es necesario
    $reserva->save();

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
