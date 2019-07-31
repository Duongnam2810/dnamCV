<?php

namespace App\Http\Middleware;

use Closure;

class TestMiddlewareController
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $abc=null)
    {
        dd($abc);

        $myName = $request->name;
        if($myName !== 'admin'){
            return redirect('test-number');
        }

        return $next($request);
    }
}
