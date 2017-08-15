<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param mixed
     */
    public function handle($request, Closure $next)
    {
        if (false === Auth::guard('admin')->check()) {
            if(preg_match( "/^admin/", $request->route()->getName())){
                return redirect(ADMIN_URL_PREFIX . '/login');
            }
        }
        return $next($request);
    }
}
