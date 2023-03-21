<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Utilisateur
{
    /**
     * Renvoit une alerte lorsque le user va essayer de trouver la page "dashboard" sans s'être connecté.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::guard('utilisateur')->check())
        {
            return redirect()->route('login_from')->with('error',"S'il-vous-plaît, connectez-vous d'abord pour accéder à cette page utilisateur.");
        }
        return $next($request);
    }
}
