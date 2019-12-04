<?php

namespace App\Http\Controllers\Jiaju;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Shop;
//家居产品
class ProductController extends Controller
{
     public function detail(Request $request,$id)
    {
         echo $value = $request->session()->get('key');
         
         $Product = new Product;
         
         $product_detail = Product::where('pro_id', $id)->get();
         
         foreach ($product_detail as $product) {
            $content =  $product->content;
            $shop_id = $product->shop_id;
            $is_sale = $product->is_sale;
         }
         
        
        $shop_detail = Shop::where('shop_id', $shop_id)->get();
         
         return view('/jiaju/product_detail', ['product_detail' => $product_detail,'content' => $content,'shop_detail' => $shop_detail
                 ]);
    }
    
    public function detail_json(Request $request,$id)
    {
        
         $Product = new Product;
         
         $product_detail = Product::where('pro_id', $id)->first();
          return $product_detail->toJson();
    }
}
