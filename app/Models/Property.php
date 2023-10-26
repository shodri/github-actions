<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'develop_id',
        'utype_id',
        'total_size',
        'covered_size',
        'uncovered_size',
        'total_areas',
        'bedrooms',
        'bathrooms',
        'views',
        'orientation',
        'description',
        'details',
    ];
    
    public function develop(): BelongsTo
    {
        return $this->belongsTo(Develop::class);
    }
    
    public function utype(): BelongsTo
    {
        return $this->belongsTo(Utype::class);
    }

    public function units(): HasMany
    {
        return $this->hasMany(Unit::class);
    }

    public function attributes(): BelongsToMany
    {
        return $this->belongsToMany(Attribute::class)->withPivot('value');
    }

}
