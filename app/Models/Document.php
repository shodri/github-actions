<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;

class Document extends Model
{
    use HasFactory;

    protected static function boot() {
        parent::boot();
        static::deleting(function(Document $fileToDelete) {
            if($fileToDelete->mode == 'internal') Storage::delete($fileToDelete->path);
        });
    }

    protected $fillable = [
        'name',
        'description',
        'type',
        'subtype',
        'order',
        'class',
        'mode',
        'mime',
        'path',
        'status',
    ];

    public function documentable(): MorphTo
    {
        return $this->morphTo();
    } 

}
