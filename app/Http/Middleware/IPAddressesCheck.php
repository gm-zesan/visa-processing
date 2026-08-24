<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IPAddressesCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $ip_server = $_SERVER['SERVER_ADDR'];
        // $ip = $_SERVER['REMOTE_ADDR'];
        // dd($_SERVER['REMOTE_ADDR'],$_SERVER['REMOTE_PORT'], $_SERVER['SERVER_NAME'], $_SERVER['HTTP_HOST']);
        return $next($request);
    }
}
