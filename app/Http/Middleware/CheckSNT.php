<?php

namespace App\Http\Middleware;

use Closure;

class CheckSNT
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
        $respone = $next($request);

        $myNum = $request->num;
        if($myNum < 2){
            return redirect('/');
        } else if($myNum == 2){
            // return redirect('check-snt/{num}');
        } else if($myNum % 2 == 0){
            return redirect('/');
        } else{
            for($i = 3; $i < sqrt($myNum); $i += 2){
                if($myNum % $i == 0){
                    return redirect('/');
                }
            }
        }

        return $respone;
    }
}
