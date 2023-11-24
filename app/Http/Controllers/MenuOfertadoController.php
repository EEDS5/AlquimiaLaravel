<?php

namespace App\Http\Controllers;

use App\Models\MenuOfertado;
use Illuminate\Http\Request;

class MenuOfertadoController extends Controller
{
     public function index()
     {
            $menuofertados = MenuOfertado::all();
            return view('menuofertados.index', compact('menuofertados'));
     }
}
