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
     public function home(Request $request)
    {
      
       
         return view('home');
        
    }
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
    
    //家政小程序广告
    public function index_json(Request $request)
    {
         $Product = new Product;
         $product_list = $Product::where('cat_id',1)->get();
         return $product_list->toJson();
    }
    
    //拼水果小程序广告
      public function fruit_json(Request $request)
    {
         $Product = new Product;
         $product_list = $Product::where(['cat_id'=>2,'is_delete'=>0,'is_on_sale'=>1])->orderByRaw('pro_id DESC')
                 ->select('goods_name','image')
                 ->get();
         
        
         return $product_list->toJson();
    }
}
