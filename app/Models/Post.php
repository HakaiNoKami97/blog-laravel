<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    // 🔹 Define qué atributos pueden ser asignados en masa al modelo
    protected $fillable = ['title', 'description', 'published_at'];

    // 🔹 Define cómo se deben manejar los tipos de datos en ciertos atributos
    protected $casts = [
        'published_at' => 'date', // 📅 Convierte 'published_at' en un objeto de tipo fecha automáticamente
    ];

    // 🔹 Mutador para formatear 'published_at' antes de guardarlo en la base de datos
    public function setPublishedAtAttribute($value)
    {
        // 📅 Convierte el valor de 'published_at' en una fecha con formato 'YYYY-MM-DD'
        $this->attributes['published_at'] = Carbon::parse($value)->toDateString();
    }
}