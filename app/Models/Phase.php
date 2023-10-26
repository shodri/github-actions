<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Phase extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'short_name',
        'color',
        'icon',
        'order',
    ];

    public function developStages(): HasMany
    {
        return $this->hasMany(DevelopStage::class);
    }

}
