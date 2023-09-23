<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semester;
use App\Models\ServingTurn;

class ServingTurnController extends Controller
{
    public function index()
    {
        $servingTurns = ServingTurn::all();
        return $servingTurns;
        //return view('servingturn.index', compact('servingTurns'));
    }

    public function create()
    {
        $semesters = Semester::all();
        return view('servingturn.create', compact('semesters'));
    }

    public function store(Request $request)
    {
        $servingTurn = new ServingTurn([
        'startTime' => $request->get('startTime'),
        'endTime' => $request->get('endTime'),
        'semester_id' => $request->has('semester_id') ? $request->get('semester_id') : null, // Cambiado a null si no se proporciona
        'descript' => $request->get('descript'),
        'maxSlots' => $request->get('maxSlots'),
        'frozen' => $request->has('frozen') ? $request->get('frozen') : 0
    ]);

        $servingTurn->save();
        return redirect('/servingturns')->with('success', 'Serving Turn saved!');
    }



    public function show(ServingTurn $servingTurn)
    {
        return view('servingturn.show', compact('servingTurn'));
    }

    public function edit(ServingTurn $servingTurn)
    {
        $semesters = Semester::all();
        return view('servingturn.edit', compact('servingTurn', 'semesters'));
    }

    public function update(Request $request, ServingTurn $servingTurn)
    {
        $servingTurn->startTime = $request->get('startTime');
        $servingTurn->endTime = $request->get('endTime');
        $servingTurn->semesterId = $request->get('semesterId');
        $servingTurn->descript = $request->get('descript');
        $servingTurn->maxSlots = $request->get('maxSlots');
        $servingTurn->frozen = $request->get('frozen');

        $servingTurn->save();
        return redirect('/servingturns')->with('success', 'Serving Turn updated!');
    }

    public function destroy(ServingTurn $servingTurn)
    {
        $servingTurn->delete();
        return redirect('/servingturns')->with('success', 'Serving Turn deleted!');
    }
}
