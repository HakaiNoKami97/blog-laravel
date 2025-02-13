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

    protected $fillable = [
        'name',
        'email',
        'password',
        'date_of_birth',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'date_of_birth' => 'date',
    ];

    // Accesor para calcular la edad
    public function getAgeAttribute()
    {
        return $this->date_of_birth ? $this->date_of_birth->age : null;
    }

    // Mutador para asegurar que la fecha se almacene correctamente
    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = Carbon::parse($value)->format('Y-m-d');
    }

    // Scope para filtrar solo usuarios activos
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Método para verificar si un usuario es mayor de edad
    public function isAdult()
    {
        return $this->age >= 18;
    }
}