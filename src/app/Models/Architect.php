<?php

namespace App\Models;

use App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Architect extends Model
{
    use HasFactory;

    public function projects() 
    {
        return $this->belongsToMany(Project::class);
    }

}
