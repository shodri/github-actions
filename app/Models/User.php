<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

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

    public function developers(): MorphToMany
    {
        return $this->morphedByMany(Developer::class, 'roleable')->withPivot('function')->withTimestamps();
    }

    public function brokers(): MorphToMany
    {
        return $this->morphedByMany(Broker::class, 'roleable')->withPivot('function')->withTimestamps();
    }

    public function agents(): MorphToMany
    {
        return $this->morphedByMany(Agent::class, 'roleable')->withPivot('function')->withTimestamps();
    }

    public function architects(): MorphToMany
    {
        return $this->morphedByMany(Architect::class, 'roleable')->withPivot('function')->withTimestamps();
    }
   
    public function sysmods(): MorphToMany
    {
        return $this->morphedByMany(Sysmod::class, 'roleable')->withPivot('function')->withTimestamps();
    }
   
    public function getRolesAttribute()
    {
        return $this->sysmods
                ->merge($this->developers)
                ->merge($this->brokers);
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
