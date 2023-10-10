<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    public function projects() 
    {
        return $this->belongsToMany(Project::class);
    }

    public function users()
    {
        return $this->morphToMany(User::class, 'role')->withPivot('function')->withTimestamps();
    }

    public function roles()
    {
        return $this->morphMany(Role::class, 'role');
    }

}
