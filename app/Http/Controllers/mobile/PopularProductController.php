<?php

namespace App\Http\Controllers\mobile;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Shop;
use App\Banner;
class PopularProductController extends Controller
{
    //爆款频道
    
    
   public function index(Request $request)
    {   
        //文章列表
        $product_list = DB::table('products')->where([['is_on_sale', '=', '1'],
    ['is_popular', '=', '1'],
])->select('goods_name', 'pro_id','image')->orderBy('pro_id', 'desc')->get()->toArray();
        foreach ($product_list as $key => $value) {
            $product_list[$key] = (array) $value;
        }
       
        
        
         return view('/mobile/populaproduct_list', [
             'product_list' => $product_list]);
         
    }
    
   
    
}
