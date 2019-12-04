<?php

namespace App\Http\Controllers\ShopAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\User;
class ShopTopController extends Controller
{
     public function index(Request $request)
    {
        return view('shopadmin/top');
         
    }
    
    
}