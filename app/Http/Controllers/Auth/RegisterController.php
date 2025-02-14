<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Carbon\Carbon;

class RegisterController extends Controller
{
    // Método para mostrar el formulario de registro
    public function create()
    {
        // Retorna la vista donde se encuentra el formulario de registro
        return view('auth.register');
    }

    // Método para almacenar el usuario en la base de datos
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => ['required', 'string', 'max:255'], // Nombre obligatorio, de tipo string y máximo 255 caracteres
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'], // Correo obligatorio, válido, único en la tabla users
            'password' => ['required', 'confirmed', Rules\Password::defaults()], // Contraseña obligatoria y confirmada
            'date_of_birth' => ['required', 'date', function ($attribute, $value, $fail) { // Fecha de nacimiento obligatoria y de tipo fecha
                if (Carbon::parse($value)->age < 18) { // Verifica si el usuario tiene menos de 18 años
                    $fail('Debes ser mayor de 18 años para registrarte.'); // Muestra un mensaje de error si es menor de edad
                }
            }],
        ]);

        // Crear el usuario con estado inactivo
        $user = User::create([
            'name' => $request->name, // Asigna el nombre ingresado
            'email' => $request->email, // Asigna el email ingresado
            'password' => Hash::make($request->password), // Encripta la contraseña antes de guardarla
            'date_of_birth' => $request->date_of_birth, // Asigna la fecha de nacimiento ingresada
            'is_active' => false, // El usuario se crea con estado inactivo por defecto
        ]);

        // Redirige a la página de inicio de sesión con un mensaje de éxito
        return redirect()->route('login')->with('status', 'Registro exitoso. Espera la activación de tu cuenta.');
    }
}