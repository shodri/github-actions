<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dtype extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dclass_id',
    ];

    public function develops(): HasMany
    {
        return $this->hasMany(Develop::class);
    }

    public function dclass(): BelongsTo
    {
        return $this->belongsTo(Dclass::class);
    }

    public function utype(): BelongsToMany
    {
        return $this->belongsToMany(Utype::class);
    }

}
