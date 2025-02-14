<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica si el usuario autenticado es administrador
        if (auth()->user()?->is_admin) {
            // Si es administrador, permite continuar con la solicitud
            return $next($request);
        }

        // Si no es administrador, aborta la solicitud con un error 403 (Acceso denegado)
        abort(403, 'Acceso denegado.');
    }
}