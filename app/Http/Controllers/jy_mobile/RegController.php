<?php

namespace App\Http\Controllers\jy_mobile;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Shop;
use App\Banner;
use App\User;
use Illuminate\Support\Facades\DB;
class RegController extends Controller
{
    
    public function index(Request $request)
    {
        
        
         
         
        return view('/jy_mobile/reg');
    }
    
     public function reg(Request $request)
    {
        
           $mobile = $request->input('mobile');
           $password = $request->input('password');
         
         
          $confirm_password = $request->input('confirm_password');
          
          $result = array('openid' => "123456"  );
          
          return json_encode($result);
        
          $User = new User;

          $User->mobile_phone = $mobile;
          
          $User->password = md5($password);
          
          $User->real_password =  $password;
          $User->user_type =  1; //1为婚恋用户
          $User->save();
         
    }
    
}
