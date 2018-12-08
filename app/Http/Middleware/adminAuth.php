<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class adminAuth
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
        if (($request->user() && ($request->user()->name != 'admin' || $request->user()->role != 'admin'||$request->user()->email != 'admin@admin.com'||$request->user()->avatar!='https://statics.arastowel.com/avatars/nasirzadeh.jpg')))
        {
            return redirect('403');
        }
        elseif(!$request->user()){
            return redirect('login');
        }
        return $next($request);
    }
}
