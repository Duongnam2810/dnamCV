<?php

namespace App\Http\Middleware;

use Closure;

class CheckNumberOddOrEven
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $param = null)
    {
        // $param la tham so tu. dinh. nghia~
        // in $params
        // sau nay co the xu ly logic gi do cho param
        // dd($param);

        // luon luon duoc thuc thi 1 request nao do
        $respone = $next($request);

        // after middleware (kiem tra cac tham so route sau)
        $myNumber = $request->number;
        if($myNumber % 2 !== 0){
            return redirect('test-number');
        }
        // neu vuot qua phan check se tiep tuc thuc thi request $request . Neu khong dung dung lai request do

        return $respone;
        // dang ki middleware Kernel.php
    }
}
