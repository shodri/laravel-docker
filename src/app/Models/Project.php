<?php

namespace App\Models;

use App\Models\Developer;
use App\Models\Broker;
use App\Models\Architect;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function developers() 
    {
        return $this->belongsToMany(Developer::class);
    }

    public function brokers() 
    {
        return $this->belongsToMany(Broker::class);
    }

    public function architects() 
    {
        return $this->belongsToMany(Architect::class);
    }

}
