<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Broker extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'country',
        'state',
        'city',
        'zipcode',
        'email',
        'phone',
        'whatsapp',
        'url',
        'short_description',
        'long_description',
        'image',
        'speciality',
        'social_networks',
    ];

    protected $casts = [
        'speciality' => 'array',
    ];

    public function develops() 
    {
        return $this->belongsToMany(Develop::class);
    }

    public function users(): MorphToMany
    {
        return $this->morphToMany(User::class, 'roleable')->withPivot('function')->withTimestamps();
    }

    public function vendors()
    {
        return $this->users()->wherePivot('function', 'vendor');
    }

    public function documents(): MorphMany
    {
        return $this->morphMany(Document::class, 'documentable');
    }    

}
