<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CookingJob;

class CookingJobController extends Controller
{
    public function index()
    {
        $cookingJobs = CookingJob::all();
        return view('cookingJob.index', ['cookingJobs' => $cookingJobs]);
    }

    public function create()
    {
        return view('cookingJob.create');
    }

    public function store(Request $request)
    {
        $cookingJob = CookingJob::create($request->all());
        return redirect()->route('cookingJob.index');
    }

    public function show(string $id)
    {
        $cookingJob = CookingJob::find($id);
        return view('cookingJob.show', ['cookingJob' => $cookingJob]);
    }

    public function edit(string $id)
    {
        $cookingJob = CookingJob::find($id);
        return view('cookingJob.edit', ['cookingJob' => $cookingJob]);
    }

    public function update(Request $request, string $id)
    {
        $cookingJob = CookingJob::find($id);
        $cookingJob->update($request->all());
        return redirect()->route('cookingJob.index');
    }

    public function destroy(string $id)
    {
        $cookingJob = CookingJob::find($id);
        $cookingJob->delete();
        return redirect()->route('cookingJob.index');
    }

}
