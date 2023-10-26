<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Develop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dtype_id',
        'address',
        'country',
        'state',
        'city',
        'zipcode',
        'description',
        'details',
        'payment_modes',
        'amenities_ext',
        'status',
    ];

    public function developers() 
    {
        return $this->belongsToMany(Developer::class);
    }

    public function brokers() 
    {
        return $this->belongsToMany(Broker::class);
    }

    public function architects() 
    {
        return $this->belongsToMany(Architect::class);
    }

    public function documents(): MorphMany
    {
        return $this->morphMany(Document::class, 'documentable');
    }    

    public function documentsWhere($where) {
        return $this->documents()->where($where)
                ->orderBy('type','asc')           
                ->orderBy('subtype','asc')            
                ->orderBy('order','asc');
    }

    public function dtype(): BelongsTo
    {
        return $this->belongsTo(Dtype::class);
    }

    public function stages(): HasMany
    {
        return $this->hasMany(Dstage::class)->orderBy('start_date', 'asc');
    }

    public function availableAmenities()
    {
        return Amenitie::whereJsonContains('classes', $this->dtype->dclass->id)->get();
    }

}
