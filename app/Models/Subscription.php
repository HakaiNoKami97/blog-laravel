<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    // 🔹 Define los atributos que pueden ser asignados masivamente en el modelo
    protected $fillable = ['email', 'is_active'];

    // 🔹 Convierte automáticamente el valor de 'is_active' a un tipo booleano
    protected $casts = [
        'is_active' => 'boolean', // 🟢 Asegura que 'is_active' se maneje como verdadero (true) o falso (false)
    ];
}