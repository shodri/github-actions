<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dstage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'develop_id',
        'start_date',
        'started_date',
        'finish_date',
        'finished_date',
        'phase_id',
        'status',
    ];

    public function develop(): BelongsTo
    {
        return $this->belongsTo(Develop::class);
    }

    public function phase(): BelongsTo
    {
        return $this->belongsTo(Phase::class);
    }

    public function units(): HasMany
    {
        return $this->hasMany(Unit::class);
    }

}
