<?php

namespace App\Http\Controllers\mobile;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Shop;
use App\Banner;

//饭店-积分商城中心-积分况换产品
class ScoreProductController extends Controller
{
    public function index(Request $request)
    {
        $card_no = uniqid(mt_rand(100,999),true);
        
        $Product = new Product;
         $product_list = $Product::where('is_delete', 0)->orderBy('pro_id', 'desc')->get()->toArray();
         $product_list = (array)$product_list;
        // print_r($product_list);
         foreach ($product_list as $key => $value) {
             //echo "</br>";
             //echo $product_list[$key]['shop_id'];
            //  echo "</br>";
             $shop_detail = Shop::where('shop_id', $product_list[$key]['shop_id'])->first()->toArray();
           //   print_r($shop_detail);
            //   echo "</br>";
               $product_list[$key]['shop_name'] = $shop_detail['shop_name'];
               $product_list[$key]['address'] = $shop_detail['address'];
         }
         
         $Banner = new Banner;
         $banner_list = $Banner::where('enabled',1)->orderBy('banner_id', 'desc')->get();
        return view('/mobile/index',['product_list' => $product_list,'banner_list' => $banner_list]);
    }
    
    
    
}
