<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $roles, $guard = null)
    {
        $authguard = Auth::guard($guard);

        if ($authguard->guest()) {
            return abort(403, 'User not logged in.');
        }
        if (Str::contains($roles, '|')) {
            $roles = explode('|', $roles);
            if (!in_array($authguard->user()->currentTeamRole, $roles))
                return abort(403);
        }
        // dd();
        if ($authguard->user()->currentTeamRole == $roles)
            return abort(403);
        return $next($request);
    }
}
