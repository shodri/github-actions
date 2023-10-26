<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Utype extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function attributes(): BelongsToMany
    {
        return $this->belongsToMany(Attribute::class);
    }

    public function dtype(): BelongsToMany
    {
        return $this->belongsToMany(Dtype::class);
    }
}
