<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use PortalPersonal;

class Administrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        if(!PortalPersonal::isAdministrator(Auth::user()->id))
        {
            return redirect()->guest('');
        }

        return $next($request);
    }
}
