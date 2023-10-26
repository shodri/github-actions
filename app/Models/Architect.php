<?php

namespace App\Models;

use App\Models\Develop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Architect extends Model
{
    use HasFactory;

    public function develops() 
    {
        return $this->belongsToMany(Develop::class);
    }

    public function users(): MorphToMany
    {
        return $this->morphToMany(User::class, 'roleable')->withPivot('function')->withTimestamps();
    }

}
