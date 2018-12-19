<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\User;
use \App\AdminUser;
class IndexController extends Controller
{
     public function index(Request $request)
    {
        return view('admin/index');
         
    }
    
    public function login(Request $request)
    {
        
        
         return view('admin/login');
      }
      
      public function signin(Request $request)
     {
         
         $name = request('username');
         echo $name;
         $password  = request('password');
         echo $password;
         $posts =  AdminUser::where('user_name', $name)->where('password', $password)->get();
        
      if(!empty($posts->toArray())){
          
          $user_array = $posts->toArray();
          //print_r($user_array);
          //echo $user_array[0]['id'];
          $request->session()->put('name', $name);
          $request->session()->put('user_id',$user_array[0]['user_id']);
          return redirect('/admin/index');
          
      }else{
          return redirect('/admin/login');
      }
     }
         
    
    
}
