<?php

namespace App\Http\Controllers;

use App\Models\GestionMenu;
use App\Models\Categoria;
use App\Models\Semestre;
use App\Models\TipoPlato;
use App\Models\Turno;
use App\Models\MenuOfertado;
use App\Models\GestionMenuDetalle;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        'categoria_id' => 'required|',
        'semestre_id' => 'required|',
        'tipo_plato_id' => 'required|',
        'turno_id' => 'required|',
        'descripcion' => 'required|string|max:50',
        'imagen' => 'nullable|image|',
        'costo' => 'required|integer',
        'cupo_disponible' => 'required|integer',
        'fecha' => 'required|date',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    // Iniciar transacción
    DB::beginTransaction();
    try {
        // Crear el GestionMenu
        $gestionMenuData = $request->except(['imagen', 'menus_ofertados', 'tipos_menu']);
        $gestionMenu = GestionMenu::create($gestionMenuData);

        // Verificar si hay un archivo de imagen en la solicitud y subirlo
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('public/imagenes');
            $gestionMenu->imagen = Storage::url($path); // Guardar la URL de la imagen
            $gestionMenu->save(); // Guardar después de asignar la imagen
        }

        // Recoger los menús ofertados y los tipos de menú
        $menusOfertados = $request->input('menus_ofertados', []);
        $tiposMenu = $request->input('tipos_menu', []);

        foreach ($menusOfertados as $index => $menuOfertadoId) {
            if (isset($tiposMenu[$index])) {
                GestionMenuDetalle::create([
                    'gestion_menu_id' => $gestionMenu->id,
                    'menu_ofertado_id' => $menuOfertadoId,
                    'menu_id' => $tiposMenu[$index] // Esto debería ser el ID de la categoría del menú
                ]);
            }
        }

        // Comprometer la transacción
        DB::commit();
        return response()->json(['message' => 'Gestión de menú creada con éxito'], 201);
    } catch (\Exception $e) {
        // Si algo sale mal, revierte la transacción
        DB::rollback();
        return response()->json(['error' => $e->getMessage()], 500);
    }
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
