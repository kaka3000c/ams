<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdminSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle( $request, Closure $next)
    {
      if ($request->session()->has('name')) {
           $name = $request->session()->get('name');
          }
     
        if(empty($name)){
         
        return redirect()->to('/admin');
       }
      
       return $next($request);
    }
}
