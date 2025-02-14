<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckActiveUser
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica si el usuario está autenticado y su estado no es "active"
        if (Auth::check() && Auth::user()->status !== 'active') {
            // Si el usuario no está activo, lo redirige a la página de inicio con un mensaje de error
            return redirect()->route('home')->with('error', 'Tu cuenta no está activa.');
        }

        // Si el usuario está activo, permite que la solicitud continúe
        return $next($request);
    }
}