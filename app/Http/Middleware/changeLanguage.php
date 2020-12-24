<?php

namespace App\Http\Middleware;

use Closure;

class changeLanguage
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
        if(isset($request -> lang)  && $request -> lang == 'en' ){
            app()->setLocale('en');
        }else{
            app()->setLocale('ar');
        }

        return $next($request);
    }
}
