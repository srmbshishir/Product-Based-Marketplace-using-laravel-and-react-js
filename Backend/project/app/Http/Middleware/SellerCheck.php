<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SellerCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(session('type') == 'seller'){
            return $next($request);
        }else{
            $request->session()->flash('msg', 'Invalid request');
            return redirect('/login');
        }
    }
}
