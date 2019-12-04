<?php

namespace App\Http\Controllers\jy_mobile;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Shop;
use App\Banner;
class UserCenterController extends Controller
{
    
    public function index(Request $request)
    {
        
        $mobile = $request->session()->get('mobile');
        
        $user = DB::table('users')->where('mobile_phone', $mobile)->first();
        $user = (array) $user;
        
         
        return view('/jy_mobile/user_center',['mobile' => $mobile, 'user' => $user]);
    }
    
}
