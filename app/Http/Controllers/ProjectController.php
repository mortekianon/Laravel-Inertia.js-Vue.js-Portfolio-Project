<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = ProjectResource::collection(Project::with('skills')->get());
        return Inertia::render('Projects/index', compact('projects'));
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
    public function edit(Project $project)
    {
        $skills = Skill::all();
        return Inertia::render('Projects/edit', compact('project', 'skills'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $image = $project->image;
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'project_url' => 'required|string|min:3|',
            'skill_id' => 'required'
        ]);
        if($request->hasFile('image')){
            Storage::delete($project->image);
            $image = $request->file('image')->store('projects');
        };

        $project->update([
            'name' => $validated['name'],
            'project_url' => $validated['project_url'],
            'image' =>  $image,
        ]);

        $project->skills()->sync($validated['skill_id']);

        return redirect()->route('projects.index')->with('success', 'Project successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        Storage::delete($project->image);
        $project->delete();
    }
}
