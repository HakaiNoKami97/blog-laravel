<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', auth()->id())->get(); // Excluye al usuario actual
        return view('admin.users.index', compact('users'));
    }

    public function toggleStatus(User $user)
    {
        $user->is_active = !$user->is_active;
        $user->save();

        return redirect()->route('admin.users.index')->with('status', 'Estado del usuario actualizado correctamente.');
    }
}