<?php
//婚恋网首页
namespace App\Http\Controllers\jy_mobile;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Shop;
use App\Banner;
use App\User;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $user_list = DB::table('users')->where('user_type', 1)->select('jy_nickName','id','touxiang')->get()->toArray();
        
         foreach ($user_list as $key => $value) {
            $user_list[$key] = (array)$value;
        }
       
        return view('/jy_mobile/index',['user_list' => $user_list]);
    }
    
    
    
}
