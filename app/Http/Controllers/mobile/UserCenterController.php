<?php

namespace App\Http\Controllers\mobile;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Shop;
use App\Banner;
class UserCenterController extends Controller
{
    
    public function index(Request $request)
    {
        
        $mobile = $request->session()->get('mobile');
        
        
        
         
        return view('/mobile/user_center',['mobile' => $mobile]);
    }
    
}
