<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Shop;
class ShopController extends Controller
{
    public function index(Request $request,$id)
    {
        
        
         return view('shop_index', ['product_detail' => $product_detail,'content' => $content,'shop_detail' => $shop_detail]);
    }
    
    
    
     public function detail(Request $request,$id)
    {
        
         $shop_detail = Shop::where('shop_id', $id)->first()->toArray();
         
         $Product = new Product;
         $product_list = $Product::where('is_delete', 0)->where('shop_id', $id)->orderBy('pro_id', 'desc')->get()->toArray();
         $product_list = (array)$product_list;
         
        
         
         return view('shop_index', ['shop_detail' => $shop_detail,'product_list' => $product_list]);
    }
}


?>
