<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Shop;
use App\Banner;
class FangCangController extends Controller
{
    //房产频道-官网频道
    
    
   public function index(Request $request)
    {   
        
        
        //二手房列表
        $second_house_list = DB::table('products')->where([['cat_id', '=', '36'],
  
])->select('goods_name', 'pro_id','image')->orderBy('pro_id', 'desc')->get()->toArray();
        foreach ($second_house_list as $key => $value) {
            $second_house_list[$key] = (array) $value;
        }
       
       
        
         return view('/second_house_list', ['second_house_list' => $second_house_list]);
         
    }
    
    //新房产频道-官网频道
    public function new_house(Request $request){
        
        //新房列表
        $new_house_list = DB::table('products')->where([['cat_id', '=', '35'],
  
])->select('goods_name', 'pro_id','image')->orderBy('pro_id', 'desc')->get()->toArray();
        foreach ($new_house_list as $key => $value) {
            $new_house_list[$key] = (array) $value;
        }
          return view('/new_house_list', [
             'new_house_list' => $new_house_list 
                
                  ]);
        
    }
    //租房产频道-官网频道
    public function rent_house(Request $request){
        
        
         //租房列表
        $rent_house_list = DB::table('products')->where([['cat_id', '=', '37'],
  
])->select('goods_name', 'pro_id','image')->orderBy('pro_id', 'desc')->get()->toArray();
        foreach ($rent_house_list as $key => $value) {
            $rent_house_list[$key] = (array) $value;
        }
          return view('/rent_house_list', [
             'rent_house_list' => $rent_house_list 
                 
                  ]);
        
    }
}
