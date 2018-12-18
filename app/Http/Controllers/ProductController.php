<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{
     public function detail(Request $request,$id)
    {
         echo $value = $request->session()->get('key');
         echo $id;
         $Product = new Product;
         
         $product_detail = Product::where('pro_id', $id)->get();
         
         echo 3;
         //print_r($product_detail);
         return view('product_detail', ['product_detail' => $product_detail]);
    }
    
    public function detail_json(Request $request,$id)
    {
        
         $Product = new Product;
         
         $product_detail = Product::where('pro_id', $id)->first();
          return $product_detail->toJson();
    }
}
