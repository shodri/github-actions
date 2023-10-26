<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Sysmod extends Model
{
    use HasFactory;

    public function users(): MorphToMany
    {
        return $this->morphToMany(User::class, 'roleable')->withPivot('function')->withTimestamps();
    }
}
