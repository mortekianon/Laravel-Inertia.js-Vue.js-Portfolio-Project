<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Projects/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skills = Skill::all(); 
        return inertia('Projects/create', [
            'skills' => $skills
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255|unique:projects,name',
            'image' => 'required|image',
            'project_url' => 'required|string|unique:projects,project_url',
            'skill_id' => 'required|array', 
            'skill_id.*' => 'exists:skills,id' 

        ]);
        if($request->hasFile('image')){
            $image = $request->file('image')->store('projects');

            $project = Project::create([
                'name' => $validated['name'],
                'project_url' => $validated['project_url'],
                'image' => $image
            ]);

            $project->skills()->attach($validated['skill_id']);

            return redirect()->route('projects.index')->with('success', 'Project successfully added!');
        }
        return redirect()->route('projects.index');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
