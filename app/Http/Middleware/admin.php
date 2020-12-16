<?php

namespace App\Http\Middleware;

use Closure;

class admin
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
        if(auth()->user() ){
            if(auth()->user()->roles[0]->name !='customer'){
                return $next($request);

            }else{
                return redirect()->to('dashboard/login');
            }

        }
    }
}
