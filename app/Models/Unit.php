<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'develop_unit_type_id',
        'develop_stage_id',
        'broker_id',
        'agent_id',
        'status',
        'status_date',
    ];

    public function develop_unit_type(): BelongsTo
    {
        return $this->belongsTo(DevelopUnitType::class);
    }

    public function dstage(): BelongsTo
    {
        return $this->belongsTo(Dstage::class);
    }

}
