<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica si el usuario está autenticado y es admin
        if (Auth::check() && Auth::user()->role_id === 1 || Auth::user()->role_id === 2) {
            return $next($request);
        }

        // Opcional: redirige o aborta
        abort(403, 'No tienes permiso para acceder a esta sección.');
    }
}
