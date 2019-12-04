<?php

namespace App\Http\Controllers\mobile;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Shop;
use App\Banner;
use App\Category;
class CategoryController extends Controller
{
    public function index(Request $request)
    {
        
         
         
         return view('/mobile/category');
        
    }
    
     public function detail(Request $request,$id)
    {
        
         $product_list = Product::where('cat_id', $id)->get()->toArray();
         $product_list = (array)$product_list;
         foreach ($product_list as $key => $value) {
             //echo "</br>";
             //echo $product_list[$key]['shop_id'];
            //  echo "</br>";
             if(!empty($product_list[$key]['shop_id'])){
             $shop_detail = Shop::where('shop_id', $product_list[$key]['shop_id'])->first()->toArray();
           //   print_r($shop_detail);
            //   echo "</br>";
               $product_list[$key]['shop_name'] = $shop_detail['shop_name'];
               $product_list[$key]['address'] = $shop_detail['address'];
               }else{
                    $product_list[$key]['shop_name'] = null;
               $product_list[$key]['address'] = null;
               }
         }
         
         
         
         return view('/mobile/category_detail', ['product_list' => $product_list]);
        
    }
    
    
    
}
