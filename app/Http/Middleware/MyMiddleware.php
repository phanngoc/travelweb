<?php

namespace App\Http\Middleware;

use Closure;

class MyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $param1, $param2)
    {
        echo "before myrequest ".$param1."|".$param2."<br/>";
        $result = $next($request);
        echo "after myrequest <br/>";  
        return $result;
    }
}
