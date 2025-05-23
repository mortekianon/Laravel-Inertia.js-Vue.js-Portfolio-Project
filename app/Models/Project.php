<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'project_url'];

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
}
