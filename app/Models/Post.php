<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $fillable = ['title', 'description', 'published_at'];

    protected $casts = [
        'published_at' => 'date', // Asegura que published_at se maneje como fecha
    ];

    // Convertir published_at solo a fecha al guardar
    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = Carbon::parse($value)->toDateString();
    }
}