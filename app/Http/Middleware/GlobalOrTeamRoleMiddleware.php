<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GlobalOrTeamRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $globalOrTeamRoles, $guard = null)
    {
        $authguard = Auth::guard($guard);
        if ($authguard->guest()) {
            abort(403, 'User not logged in.');
        }
        $roles = is_array($globalOrTeamRoles) ?
            $globalOrTeamRoles :
            explode('|', $globalOrTeamRoles);
        if (!$authguard->user()->hasGlobalRole($globalOrTeamRoles) && !$authguard->user()->hasTeamRole($globalOrTeamRoles)){
            return abort(403, 'Rol global o Rol de equipo no autorizados.');
        }
        return $next($request);
    }
}
