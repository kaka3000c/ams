<?php

namespace App\Http\Middleware;

use Closure;

class CheckShopSession
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
      if ($request->session()->has('mobile')) {
           $mobile = $request->session()->get('mobile');
          }
     
        if(empty($mobile)){
         
        return redirect()->to('/admin/shop/login');
       }
      
       return $next($request);
    }
}
