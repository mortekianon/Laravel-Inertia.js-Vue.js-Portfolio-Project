<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Skills/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specializations = Specialization::all(); 
        return inertia('Skills/create', [
            'specializations' => $specializations
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255|unique:skills,name',
            'image' => 'required|image',
            'specialization_id' => 'required|exists:specializations,id'

        ]);
        if($request->hasFile('image')){
            $image = $request->file('image')->store('skills');

            $skill = Skill::create([
                'name' => $validated['name'],
                'image' => $image
            ]);

            $skill->specializations()->attach($validated['specialization_id']);

            return redirect()->route('skills.index')->with('success', 'Skill successfully added!');
        }
        return redirect()->route('skills.index');
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
