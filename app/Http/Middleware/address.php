<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class address
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
        if (\App\address::where('user_id',Auth::user()->id)->count()==0){
            return redirect('profile/addresses/add?callback=shipping');
        }


        return $next($request);
    }
}
