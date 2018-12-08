<?php

namespace App\Http\Middleware;

use Closure;

class orders
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
        function getUserIP()
        {
            // Get real visitor IP behind CloudFlare network
            if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            }
            $client  = @$_SERVER['HTTP_CLIENT_IP'];
            $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
            $remote  = $_SERVER['REMOTE_ADDR'];

            if(filter_var($client, FILTER_VALIDATE_IP))
            {
                $ip = $client;
            }
            elseif(filter_var($forward, FILTER_VALIDATE_IP))
            {
                $ip = $forward;
            }
            else
            {
                $ip = $remote;
            }

            return $ip;
        }

        $user_ip = getUserIP();
        $agent = new \Jenssegers\Agent\Agent();
        $user_platform = $agent->platform();
        $user_browser = $agent->browser();
        $pre_order=\App\Pre_order::where('user_ip',$user_ip)->where('user_platform',$user_platform)->where('user_browser',$user_browser)->get();

        if ($pre_order->count()==0){
            return redirect('/product');
        }

        return $next($request);
    }
}
