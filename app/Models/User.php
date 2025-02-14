<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // 🔹 Define los atributos que pueden ser asignados masivamente en el modelo
    protected $fillable = [
        'name',          // Nombre del usuario
        'email',         // Correo electrónico del usuario
        'password',      // Contraseña del usuario (se almacenará de forma encriptada)
        'date_of_birth', // Fecha de nacimiento del usuario
        'is_active',     // Estado de activación del usuario (activo/inactivo)
    ];

    // 🔹 Define los atributos que deben permanecer ocultos al serializar el modelo (por ejemplo, al devolver JSON)
    protected $hidden = [
        'password',        // Oculta la contraseña para evitar que se exponga en respuestas JSON
        'remember_token',  // Oculta el token de "recuérdame" usado en autenticación
    ];

    // 🔹 Convierte automáticamente ciertos atributos a tipos específicos
    protected $casts = [
        'is_active' => 'boolean',  // Convierte 'is_active' en un valor booleano (true o false)
        'date_of_birth' => 'date', // Convierte 'date_of_birth' en un objeto de tipo fecha
    ];

    // 🔹 Accesor para calcular la edad del usuario basado en su fecha de nacimiento
    public function getAgeAttribute()
    {
        return $this->date_of_birth ? $this->date_of_birth->age : null; // Devuelve la edad en años o null si no hay fecha
    }

    // 🔹 Mutador para asegurar que la fecha de nacimiento se almacene correctamente en formato 'Y-m-d'
    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = Carbon::parse($value)->format('Y-m-d'); // Convierte cualquier formato de fecha a 'YYYY-MM-DD'
    }

    // 🔹 Scope para filtrar solo los usuarios activos
    public function scopeActive($query)
    {
        return $query->where('is_active', true); // Retorna solo los usuarios que están activos
    }

    // 🔹 Método para verificar si el usuario es mayor de edad (18 años o más)
    public function isAdult()
    {
        return $this->age >= 18; // Devuelve true si el usuario es mayor de edad, false si no lo es
    }
}