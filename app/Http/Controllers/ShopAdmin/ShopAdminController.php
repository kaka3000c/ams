<?php

namespace App\Http\Controllers\ShopAdmin;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator; 
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Shop;
class ShopAdminController extends Controller
{
     public function index(Request $request)
    {
         return view('shopadmin/index');
         
    }
    
    //商家登录
    public function login(Request $request)
    {
        
        return view('shopadmin/shop_login');
    }
    
    //商家登录验证
    public function sign(Request $request)
    {
        
         $mobile = $request->input('mobile');
          
         $password = md5($request->input('password'));
         
          $shop = DB::table('shops')->where('mobile', $mobile)->where('password', $password)->first();
          $shop = (array)$shop;
         
          if(!empty($shop)){
               $request->session()->put('mobile', $shop['mobile']);
               $request->session()->put('shop_id', $shop['shop_id']);
               return redirect('/shopadmin/index');
          }else{
               echo "登录失败";
          }
         
    }
    
    //登出行为
    public function  logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/shopadmin/login');
    }
    
  
    
}