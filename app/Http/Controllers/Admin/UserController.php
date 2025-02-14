<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Obtiene todos los usuarios excepto el usuario autenticado
        $users = User::where('id', '!=', auth()->id())->get();

        // Retorna la vista 'admin.users.index' y envía la lista de usuarios
        return view('admin.users.index', compact('users'));
    }

    public function toggleStatus(User $user)
    {
        // Invierte el estado actual del usuario (activo/inactivo)
        $user->is_active = !$user->is_active;

        // Guarda el cambio en la base de datos
        $user->save();

        // Redirige de vuelta a la lista de usuarios con un mensaje de éxito
        return redirect()->route('admin.users.index')->with('status', 'Estado del usuario actualizado correctamente.');
    }
}