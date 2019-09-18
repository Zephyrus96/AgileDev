<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CheckUserMiddleware
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
        if(Auth::guest()){
            abort(401);
        }
        else{
            $username = $request->user()->username;
            $requestedUser = explode('/',$request->path())[0];
            if(strcmp($username,$requestedUser) != 0){
                abort(403);
            }
        }
        return $next($request);
    }
}
