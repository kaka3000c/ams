<?php

namespace App\Http\Controllers\mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Shop;
use App\Banner;
use App\HotelWeixingProduct;
use App\HotelOrder;
use Illuminate\Support\Facades\DB;
//饭店-微信商城

class HotelWeixingProductController extends Controller
{
    public function index(Request $request)
    {
         //读取service_users表的id，存为service_user_id
         $service_user_id = $request->session()->get('service_user_id');
        
         $Product = new HotelWeixingProduct;
        
         $product_list = $Product::where('is_delete', 0)->orderBy('pro_id', 'desc')->get()->toArray();
         
        
         
         
         
         return view('/mobile/HotelWeixingProduct',['product_list' => $product_list]);
        
    }
    
    //微信商品详情
    public function detail(Request $request,$id){
        
        $product = DB::table('hotel_weixing_products')->where('pro_id',$id)->first();
        $product = (array)$product;
        
        return view('/mobile/HotelWeixingProductDetail',['product' => $product]);
        
    }
    
    
    
}
