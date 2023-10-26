<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Dclass extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function dtypes(): HasMany
    {
        return $this->hasMany(Dtype::class);
    }

    public function develops(): HasManyThrough
    {
        return $this->hasManyThrough(Develop::class, DevelopType::class);
    }

}
