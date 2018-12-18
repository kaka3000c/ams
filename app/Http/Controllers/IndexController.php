<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Banner;
class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
                
         $name = $request->session()->get('name');

         $Product = new Product;
         $product_list = $Product::all();
        // print_r($product_list);
         
         $Banner = new Banner;
         $banner_list = $Banner::all();
         //print_r($banner_list);
       
         return view('index', ['name' => $name],['product_list' => $product_list,'banner_list' => $banner_list]);
        
    }
    
    public function index_json(Request $request)
    {
         $Product = new Product;
         $product_list = $Product::all();
         return $product_list->toJson();
    }
}
