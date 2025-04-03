<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Http\Resources\SkillResource;
use App\Http\Resources\SpecializationResource;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WelcomeController extends Controller
{
    public function welcome(){
        $specializations = SpecializationResource::collection(Specialization::all());
        $skills = SkillResource::collection(Skill::with('specializations')->get());
        $projects = ProjectResource::collection(Project::with('skills')->get());


        return Inertia::render('Welcome', compact('specializations', 'skills', 'projects'));
    }
}
