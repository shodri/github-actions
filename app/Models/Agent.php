<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Agent extends Model
{
    use HasFactory;

    protected $table = 'agents';

    protected $fillable = [
        'name',
    ];


    public function users(): MorphToMany
    {
        return $this->morphToMany(User::class, 'roleable')->withPivot('function')->withTimestamps();
    }


}
