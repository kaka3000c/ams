<?php

namespace App\Http\Controllers\mobile;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Shop;
use App\Banner;
use App\User;
class RegController extends Controller
{
    
    public function index(Request $request)
    {
        
        
         
         
        return view('/mobile/reg');
    }
    
     public function reg(Request $request)
    {
        
           $mobile = $request->input('mobile');
           $password = $request->input('password');
         
         
          $confirm_password = $request->input('confirm_password');
        
        
          $User = new User;

          $User->mobile_phone = $mobile;
          
          $User->password = md5($password);
          
          $User->real_password =  $password;
          
          $User->save();
         
    }
    
}
