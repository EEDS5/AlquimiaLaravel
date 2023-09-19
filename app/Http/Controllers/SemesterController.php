<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semester;
use App\Models\ServingTurn;

class SemesterController extends Controller
{
    public function index()
    {
        $semesters = Semester::all();
        return view('semester.index', compact('semesters'));
    }

    public function create()
    {
        return view('semester.create');
    }

    public function store(Request $request)
    {
        $semester = new Semester([
            'dateStart' => $request->get('dateStart'),
            'dateEnd' => $request->get('dateEnd'),
            'frozen' => $request->get('frozen')
        ]);

        $semester->save();
        return redirect('/semesters')->with('success', 'Semester saved!');
    }

    public function show(Semester $semester)
    {
        return view('semester.show', compact('semester'));
    }

    public function edit(Semester $semester)
    {
        return view('semester.edit', compact('semester'));
    }

    public function update(Request $request, Semester $semester)
    {
        $semester->dateStart = $request->get('dateStart');
        $semester->dateEnd = $request->get('dateEnd');
        $semester->frozen = $request->get('frozen');

        $semester->save();
        return redirect('/semesters')->with('success', 'Semester updated!');
    }

    public function destroy(Semester $semester)
    {
        $semester->delete();
        return redirect('/semesters')->with('success', 'Semester deleted!');
    }
}