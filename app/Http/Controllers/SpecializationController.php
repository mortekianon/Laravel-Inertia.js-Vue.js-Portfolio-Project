<?php

namespace App\Http\Controllers;

use App\Http\Resources\SpecializationResource;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Ramsey\Uuid\Type\Integer;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specializations = SpecializationResource::collection(Specialization::all());
        return Inertia::render('Specializations/index', compact('specializations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Specializations/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255|unique:specializations,name'
        ]);
    
        Specialization::create($validated);
    
        return redirect()->route('specializations.index')->with('success', 'Specialization successfully added!');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specialization $specialization)
    {
        return Inertia::render('Specializations/edit', compact('specialization'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Specialization $specialization)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
        ]);
        $specialization->update($validated);

        return redirect()->route('specializations.index')->with('success', 'Specialization successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specialization $specialization)
    {

        $skills = $specialization->skills;
        $specialization->skills()->detach();
        $specialization->delete();

        foreach ($skills as $skill) {
            $skill->load('specializations'); 
            $projects = $skill->projects; 

            if ($skill->specializations->count() === 0) { 
                $skill->delete(); 
                foreach ($projects as $project) { 
                    $project->load('skills'); 
                    if ($project->skills->count() === 0) {
                        Storage::delete($project->image); 
                        $project->delete(); 
                    }
                }
            }
        }
        return redirect()->back();
    }
}
