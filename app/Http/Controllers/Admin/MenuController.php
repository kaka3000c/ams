<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\User;
class MenuController extends Controller
{
     public function index(Request $request)
    {
        return view('admin/menu');
         
    }
    
    
}