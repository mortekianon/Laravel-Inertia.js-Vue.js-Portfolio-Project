<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image'];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function specializations()
    {
        return $this->belongsToMany(Specialization::class, 'specialization_skill');
    }


}
