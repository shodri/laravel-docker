<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Support\Str;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'language',
        'whatsapp',
        'birthdate',
        'company',
        'country',
        'city',
        'picture',
        'google_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function developers()
    {
        return $this->morphedByMany(Developer::class, 'role')->withPivot('function')->withTimestamps();
    }

    public function brokers()
    {
        return $this->morphedByMany(Broker::class, 'role')->withPivot('function')->withTimestamps();
    }
   
    public function roles()
    {
        //return $this->hasMany(Role::class);
        $developers = $this->developers()->get();
        $brokers = $this->brokers()->get();
        return collect()->merge($developers)->merge($brokers);
    }

    public function getWhappCodeAttribute()
    {
        return Str::startsWith($this->whatsapp, '+')
               ? substr(Str::before($this->whatsapp, ' '), 1)
               : '';
    }
   
    public function getWhappNumAttribute()
    {
        return Str::startsWith($this->whatsapp, '+')
               ? Str::afterLast($this->whatsapp, ' ')
               : $this->whatsapp;
    }
   
  
}
