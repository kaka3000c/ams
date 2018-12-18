<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
class LoginController extends Controller
{
     //登录页面
    public function  index(Request $request)
    {
        
        
         return view('login.index');
      
    }
    //登录行为
    public function  login(Request $request)
    {
         $name = request('username');
         $password = request('password');
         $posts =  User::where('name', $name)->where('password', $password)->get();
      
      if(!empty($posts->toArray())){
          
          $user_array = $posts->toArray();
          print_r($user_array);
          echo $user_array[0]['id'];
          $request->session()->put('name', $name);
          
          $request->session()->put('user_id',$user_array[0]['id']);
          return redirect('/index');
          
      }else{
          return redirect('/login');
      }
         
    }
    
     //登出行为
    public function  logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/index');
    }
}
