<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class RegisterController extends Controller
{
    //注册页面
    public function  index()
    {
        return view('register.index');
    }
    
    //注册行为
    public function  register()
    {
         
        //验证
        $this->validate(request(),[
           'name' => 'required|min:3',
        ]);
        //逻辑
        $name = request('name');
        $email = request('email');
        $password = request('password');
         
        $user = User::create(compact('name','email','password'));
        
        
        return redirect('/login');
        //渲染
    }
}
