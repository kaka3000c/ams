<?php

namespace App\Http\Controllers\mobile;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Shop;
use App\Banner;
class FangCangController extends Controller
{
    //房产频道-官网频道
    
    //新房
   public function index(Request $request)
    {   
       //新房列表
        $product_list = DB::table('products')->where([['cat_id', '=', '35'],
  
])->select('goods_name', 'pro_id','image')->orderBy('pro_id', 'desc')->get()->toArray();
        foreach ($product_list as $key => $value) {
            $product_list[$key] = (array) $value;
        }
       
        
         return view('/mobile/house_list', [
             'product_list' => $product_list]);
         
    }
    
    //二手房
    public function second(Request $request)
    {  
          //二手房列表
        $product_list = DB::table('products')->where([['cat_id', '=', '36'],
  
])->select('goods_name', 'pro_id','image')->orderBy('pro_id', 'desc')->get()->toArray();
        foreach ($product_list as $key => $value) {
            $product_list[$key] = (array) $value;
        }
       
        
         return view('/mobile/house_list', [
             'product_list' => $product_list]);
    }
    
    //租房
    public function rent(Request $request)
    {  
          //新房列表
        $product_list = DB::table('products')->where([['cat_id', '=', '37'],
  
])->select('goods_name', 'pro_id','image')->orderBy('pro_id', 'desc')->get()->toArray();
        foreach ($product_list as $key => $value) {
            $product_list[$key] = (array) $value;
        }
       
        
         return view('/mobile/house_list', [
             'product_list' => $product_list]);
    }
}
