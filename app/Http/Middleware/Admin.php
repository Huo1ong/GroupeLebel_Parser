<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Renvoit une alerte lorsque qu'une personne va essayer d'accéder à une des pages "dashboard" sans s'être connectée.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if(!Auth::guard('web')->check())
        {
            return redirect()->route('connexion')->with('error',"S'il-vous-plaît, connectez-vous d'abord pour accéder à cette page.");
        }
        return $next($request);
    }
}
