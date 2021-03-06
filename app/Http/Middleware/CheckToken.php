<?php

namespace App\Http\Middleware;

use Closure;

class CheckToken
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
        if($request->input('token')!= 'http://www.baidu.com'){
             return redirect()->to('http://www.baidu.com');
        }
            
        return $next($request);
    }
}
