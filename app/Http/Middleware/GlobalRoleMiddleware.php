<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;

class GlobalRoleMiddleware
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
            throw UnauthorizedException::notLoggedIn();
        }
        // dd($authguard->user()->currentRole);
        // if (!$authguard->user()->currentTeamRole){
        //     return $next($request);
        // }
        // dd($roles);
        $roles = is_array($roles) ?
            $roles :
            explode('|', $roles);
        if (!$authguard->user()->hasGlobalRole($roles) && !$authguard->user()->hasTeamRole($roles)){
            throw UnauthorizedException::forRoles($roles);
        }

        return $next($request);
    }
}
