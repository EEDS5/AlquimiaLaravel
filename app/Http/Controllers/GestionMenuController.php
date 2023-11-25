<?php

namespace App\Http\Controllers;

use App\Models\GestionMenu;
use App\Models\Categoria;
use App\Models\Semestre;
use App\Models\TipoPlato;
use App\Models\Turno;
use App\Models\MenuOfertado;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class GestionMenuController extends Controller
{
    public function index()
    {
        // Obtener todos los gestiones de menú con sus relaciones
        $gestionMenus = GestionMenu::with(['categoria', 'semestre', 'tipoPlato', 'turno', 'menuOfertado'])->get();
        return response()->json($gestionMenus);
    }

    public function getMenusActivos()
    {
        $menusActivos = GestionMenu::where('estado', 'A')->get();
        return response()->json($menusActivos);
    }

    public function store(Request $request)
    {
        // Validar los datos del request
        $validator = Validator::make($request->all(), [
            'categoria_id' => 'required|exists:categorias,id',
            'semestre_id' => 'required|exists:semestres,id',
            'tipo_plato_id' => 'required|exists:tipo_platos,id',
            'turno_id' => 'required|exists:turnos,id',
            'menu_ofertado_id' => 'required|exists:menu_ofertados,id',
            'descripcion' => 'required|string|max:50',
            'imagen' => 'nullable|string|max:255',
            'costo' => 'required|numeric',
            'total_cupo' => 'required|integer',
            'cupo_disponible' => 'required|integer',
            'fecha' => 'required|date',
            'estado' => 'required|in:A,I',
        ]);

        $gestionMenu = new GestionMenu($request->except(['imagen']));

        // Verificar si hay un archivo de imagen en la solicitud
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('public/imagenes');
            $gestionMenu->imagen = $path; // Guardar la ruta del archivo en la columna 'imagen'
        }

        // Guardar el resto de campos en la base de datos
        $gestionMenu->save();

        return response()->json($gestionMenu, 201);
    }

    public function show($id)
    {
        // Obtener una gestión de menú específica por ID
        $gestionMenu = GestionMenu::with(['categoria', 'semestre', 'tipoPlato', 'turno', 'menuOfertado'])->find($id);
        
        if (!$gestionMenu) {
            return response()->json(['error' => 'Gestión de menú no encontrada'], 404);
        }

        return response()->json($gestionMenu);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del request
        $validator = Validator::make($request->all(), [
            'categoria_id' => 'exists:categorias,id',
            'semestre_id' => 'exists:semestres,id',
            'tipo_plato_id' => 'exists:tipo_platos,id',
            'turno_id' => 'exists:turnos,id',
            'menu_ofertado_id' => 'exists:menu_ofertados,id',
            'descripcion' => 'string|max:50',
            'imagen' => 'string|max:255',
            'costo' => 'numeric',
            'total_cupo' => 'integer',
            'cupo_disponible' => 'integer',
            'fecha' => 'date',
            'estado' => 'in:A,I',
            // Agrega más reglas de validación si son necesarias
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Actualizar la gestión de menú
        $gestionMenu = GestionMenu::find($id);
        if (!$gestionMenu) {
            return response()->json(['error' => 'Gestión de menú no encontrada'], 404);
        }

        $gestionMenu->update($request->all());
        
        return response()->json($gestionMenu);
    }

    public function destroy($id)
    {
        // Eliminar una gestión de menú
        $gestionMenu = GestionMenu::find($id);
        if (!$gestionMenu) {
            return response()->json(['error' => 'Gestión de menú no encontrada'], 404);
        }

        $gestionMenu->delete();
        
        return response()->json(['success' => 'Gestión de menú eliminada'], 200);
    }
}
