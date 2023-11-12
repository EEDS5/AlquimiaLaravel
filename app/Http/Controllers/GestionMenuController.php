<?php

namespace App\Http\Controllers;

use App\Models\GestionMenu;
use App\Models\Categoria;
use App\Models\Semestre;
use App\Models\TipoPlato;
use App\Models\Turno;
use App\Models\MenuOfertado;
use Illuminate\Http\Request;

class GestionMenuController extends Controller
{
    // Muestra una lista de todas las gestiones de menú.
    public function index()
    {
        $gestionMenus = GestionMenu::with(['categoria', 'semestre', 'tipoPlato', 'turno', 'menuOfertado'])->get();
        return view('gestionMenus.index', compact('gestionMenus'));
    }

    // Muestra el formulario para crear una nueva gestión de menú.
    public function create()
    {
        $categorias = Categoria::all();
        $semestres = Semestre::all();
        $tipoPlatos = TipoPlato::all();
        $turnos = Turno::all();
        $menuOfertados = MenuOfertado::all();
        return view('gestionMenus.create', compact('categorias', 'semestres', 'tipoPlatos', 'turnos', 'menuOfertados'));
    }

    // Almacena una nueva gestión de menú en la base de datos.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'semestre_id' => 'required|exists:semestres,id',
            'tipo_plato_id' => 'required|exists:tipo_platos,id',
            'turno_id' => 'required|exists:turnos,id',
            'menu_ofertado_id' => 'required|exists:menu_ofertado,id',
            'descripcion' => 'required|max:50',
            'imagen' => 'nullable|image|max:1024', // Asumiendo que se subirá una imagen.
            'costo' => 'required|numeric',
            'total_cupo' => 'required|integer',
            'cupo_disponible' => 'required|integer',
            'fecha' => 'required|date',
            'estado' => 'required|in:A,I',
        ]);

        // Si hay una imagen, procesarla y obtener la ruta para guardarla
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('public/imagenes');
            $validatedData['imagen'] = $imagenPath;
        }

        GestionMenu::create($validatedData);
        return redirect('/gestionMenus')->with('success', 'Gestión de menú creada con éxito.');
    }

    // Muestra una gestión de menú específica.
    public function show(GestionMenu $gestionMenu)
    {
        return view('gestionMenus.show', compact('gestionMenu'));
    }

    // Muestra el formulario para editar una gestión de menú existente.
    public function edit(GestionMenu $gestionMenu)
    {
        $categorias = Categoria::all();
        $semestres = Semestre::all();
        $tipoPlatos = TipoPlato::all();
        $turnos = Turno::all();
        $menuOfertados = MenuOfertado::all();
        return view('gestionMenus.edit', compact('gestionMenu', 'categorias', 'semestres', 'tipoPlatos', 'turnos', 'menuOfertados'));
    }

    // Actualiza una gestión de menú en la base de datos.
    public function update(Request $request, GestionMenu $gestionMenu)
    {
        $validatedData = $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'semestre_id' => 'required|exists:semestres,id',
            'tipo_plato_id' => 'required|exists:tipo_platos,id',
            'turno_id' => 'required|exists:turnos,id',
            'menu_ofertado_id' => 'required|exists:menu_ofertado,id',
            'descripcion' => 'required|max:50',
            'imagen' => 'nullable|image|max:1024',
            'costo' => 'required|numeric',
            'total_cupo' => 'required|integer',
            'cupo_disponible' => 'required|integer',
            'fecha' => 'required|date',
            'estado' => 'required|in:A,I',
        ]);

        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('public/imagenes');
            $validatedData['imagen'] = $imagenPath;
        }

        $gestionMenu->update($validatedData);
        return redirect('/gestionMenus')->with('success', 'Gestión de menú actualizada con éxito.');
    }

    // Elimina una gestión de menú de la base de datos.
    public function destroy(GestionMenu $gestionMenu)
    {
        $gestionMenu->delete();
        return redirect('/gestionMenus')->with('success', 'Gestión de menú eliminada con éxito.');
    }
}
