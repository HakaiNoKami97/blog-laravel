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
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'date_of_birth' => ['required', 'date', function ($attribute, $value, $fail) {
                if (Carbon::parse($value)->age < 18) {
                    $fail('Debes ser mayor de 18 años para registrarte.');
                }
            }],
        ]);

        // Crear el usuario con estado inactivo
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'date_of_birth' => $request->date_of_birth,
            'is_active' => false, // Estado inicial inactivo
        ]);

        return redirect()->route('login')->with('status', 'Registro exitoso. Espera la activación de tu cuenta.');
    }
}