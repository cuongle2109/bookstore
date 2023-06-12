<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if($role === 'admin'){
            if (! $request->user()->isAdmin == 1) {
                return redirect()->route('mypage.home.index');
            }
        }else{
            return redirect()->route('mypage.home.index');
        }
        return $next($request);
    }
}
