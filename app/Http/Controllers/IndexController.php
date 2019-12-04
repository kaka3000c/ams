<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Shop;
use App\Banner;

class IndexController extends Controller {
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
    public function home(Request $request) {

       //商家列表
        $shop_list = DB::table('shops')->select('shop_id','shop_name', 'shop_logo')->whereIn('shop_cat_id', [11, 12, 13
            ,14, 15, 16,17,18,18,20,21,22,23,24,25,26])->get()->toArray();
        foreach ($shop_list as $key => $value) {
            $shop_list[$key] = (array) $value;
        }
        
        //爆款列表
        $product_list = DB::table('products')->where([['is_on_sale', '=', '1'],
    
])->whereIn('cat_id', [
    136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,
    161,162,163,164,165,166,167,168,169,170,171,172,173,174,175
    
])->take(8)->select('goods_name', 'pro_id','image','shop_id')->orderBy('pro_id', 'desc')->get()->toArray();
        foreach ($product_list as $key => $value) {
            
            $product_list[$key] = (array) $value;
        }
        
        foreach ($product_list as $key => $value) {
             $shop_id =  $product_list[$key]['shop_id'];
            //  echo "</br>";
             if(!empty($shop_id)){
                    $shop_detail = Shop::where('shop_id', $shop_id)->first()->toArray();
           
               $product_list[$key]['shop_name'] = $shop_detail['shop_name'];
               $product_list[$key]['address'] = $shop_detail['address'];
             }
          
           
        }
        
        return view('home',[ 
             'shop_list' => $shop_list,'product_list' => $product_list
                 ]);
    }

    public function index(Request $request) {

        $is_mobile = $this->isMobile();
        //如果是手机端则自动跳转
        if($is_mobile){
            return redirect("/mobile/index");
        }
         Log::info(date("Y-m-d H:i:s"));
      
        $name = $request->session()->get('name');



        //banner广告
        $Banner = new Banner;
        $banner_list = $Banner::all();


        
        //优惠活动
        $discount_list = DB::table('articles')->where(['cat_id' => 5, 'is_delete' => 0])->take(8)->orderBy('article_id', 'desc')->select('title', 'article_id','image')->get()->toArray();
            foreach ($discount_list as $key => $value) {
                $discount_list[$key] = (array) $value;
            }
           
         //读取茂名头条第一篇文章   
         $lead_first = DB::table('articles')->where(['cat_id' => 6, 'is_delete' => 0])->skip(0)->orderBy('article_id', 'desc')->select('title', 'article_id','image')->first();
         $lead_first = (array)$lead_first; 
       
         //读取茂名头条第二篇文章  
         $lead_sec = DB::table('articles')->where(['cat_id' => 6, 'is_delete' => 0])->skip(1)->orderBy('article_id', 'desc')->select('title', 'article_id','image')->first();
         $lead_sec = (array)$lead_sec; 
         
          
         //读取茂名头条第三篇文章   
         $lead_third = DB::table('articles')->where(['cat_id' => 6, 'is_delete' => 0])->skip(2)->orderBy('article_id', 'desc')->select('title', 'article_id','image')->first();
         $lead_third = (array)$lead_third; 
        
        //茂名头条-从第4条读起
        $lead_news_list = DB::table('articles')->where(['cat_id' => 6, 'is_delete' => 0])->skip(3)->take(8)->orderBy('article_id', 'desc')->select('title', 'article_id','image')->get()->toArray();
            foreach ($lead_news_list as $key => $value) {
                $lead_news_list[$key] = (array) $value;
            }
        
   
      
      
        //读取美食频道第一篇文章   
         $nice_food_first = DB::table('articles')->where(['cat_id' => 12, 'is_delete' => 0])->skip(0)->orderBy('article_id', 'desc')->select('title', 'article_id','image')->first();
         $nice_food_first = (array)$nice_food_first; 
        
       
         //读取美食频道第二篇文章  
         $nice_food_sec = DB::table('articles')->where(['cat_id' => 12, 'is_delete' => 0])->skip(1)->orderBy('article_id', 'desc')->select('title', 'article_id','image')->first();
         $nice_food_sec = (array)$nice_food_sec; 
         
          
         //读取美食频道第三篇文章   
         $nice_food_third = DB::table('articles')->where(['cat_id' => 12, 'is_delete' => 0])->skip(2)->orderBy('article_id', 'desc')->select('title', 'article_id','image')->first();
         $nice_food_third = (array)$nice_food_third;     
            
            
            
        //商家列表
        $shop_list = DB::table('shops')->select('shop_id','shop_name', 'shop_logo')->where('shop_cat_id', 1)->get()->toArray();
        foreach ($shop_list as $key => $value) {
            $shop_list[$key] = (array) $value;
        }

        
        //招聘信息
        $employ_list = DB::table('employs')->where(['is_show' => 1])->take(8)->orderBy('id', 'desc')->select('title', 'id')->get()->toArray();
            foreach ($employ_list as $key => $value) {
                $employ_list[$key] = (array) $value;
            }
            
         //二手房列表
        $second_house_list = DB::table('products')->where([['cat_id', '=', '36'],
  
])->take(6)->select('goods_name', 'pro_id','image')->orderBy('pro_id', 'desc')->get()->toArray();
        foreach ($second_house_list as $key => $value) {
            $second_house_list[$key] = (array) $value;
        } 
            
        //新房列表
        $new_house_list = DB::table('products')->where([['cat_id', '=', '35'],
  
])->take(6)->select('goods_name', 'pro_id','image')->orderBy('pro_id', 'desc')->get()->toArray();
        foreach ($new_house_list as $key => $value) {
            $new_house_list[$key] = (array) $value;
        }
        
          //租房列表
        $rent_house_list = DB::table('products')->where([['cat_id', '=', '37'],
  
])->take(6)->select('goods_name', 'pro_id','image')->orderBy('pro_id', 'desc')->get()->toArray();
        foreach ($rent_house_list as $key => $value) {
            $rent_house_list[$key] = (array) $value;
        }
        //爆款列表
        $product_list = DB::table('products')->where([['is_on_sale', '=', '1'],
    ['is_popular', '=', '1'],
])->take(8)->select('goods_name', 'pro_id','image','shop_id')->orderBy('pro_id', 'desc')->get()->toArray();
        foreach ($product_list as $key => $value) {
            
            $product_list[$key] = (array) $value;
        }
        
        foreach ($product_list as $key => $value) {
             $shop_id =  $product_list[$key]['shop_id'];
            //  echo "</br>";
             if(!empty($shop_id)){
                    $shop_detail = Shop::where('shop_id', $shop_id)->first()->toArray();
           
               $product_list[$key]['shop_name'] = $shop_detail['shop_name'];
               $product_list[$key]['address'] = $shop_detail['address'];
             }
          
           
        }
        
        
        return view('index', ['name' => $name], [ 'banner_list' => $banner_list
            , 'shop_list' => $shop_list
                , 'discount_list' => $discount_list
                , 'lead_news_list' => $lead_news_list
                 , 'lead_first' => $lead_first
                 , 'lead_sec' => $lead_sec
                 , 'lead_third' => $lead_third
                 , 'nice_food_first' => $nice_food_first
                 , 'nice_food_sec' => $nice_food_sec
                 , 'nice_food_third' => $nice_food_third
                 , 'employ_list' => $employ_list
                 , 'second_house_list' => $second_house_list
                , 'rent_house_list' => $rent_house_list
                ,'product_list' => $product_list
                ]);
    }

    //家政小程序广告
    public function index_json(Request $request) {
        $Product = new Product;
        $product_list = $Product::where('cat_id', 1)->get();
        return $product_list->toJson();
    }

    //拼水果小程序广告
    public function fruit_json(Request $request) {
        $Product = new Product;
        $product_list = $Product::where(['cat_id' => 2, 'is_delete' => 0, 'is_on_sale' => 1])->orderByRaw('pro_id DESC')
                ->select('goods_name', 'image')
                ->get();


        return $product_list->toJson();
    }

    //判断是否手机端
    function isMobile() {
        
        // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
        if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) {
            return true;
        }
        // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
        if (isset($_SERVER['HTTP_VIA'])) {
            // 找不到为flase,否则为true
            return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
        }
        // 脑残法，判断手机发送的客户端标志,兼容性有待提高。其中'MicroMessenger'是电脑微信
        if (isset($_SERVER['HTTP_USER_AGENT'])) {
            $clientkeywords = array('nokia', 'sony', 'ericsson', 'mot', 'samsung', 'htc', 'sgh', 'lg', 'sharp', 'sie-', 'philips', 'panasonic', 'alcatel', 'lenovo', 'iphone', 'ipod', 'blackberry', 'meizu', 'android', 'netfront', 'symbian', 'ucweb', 'windowsce', 'palm', 'operamini', 'operamobi', 'openwave', 'nexusone', 'cldc', 'midp', 'wap', 'mobile', 'MicroMessenger');
            // 从HTTP_USER_AGENT中查找手机浏览器的关键字
            if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
                return true;
            }
        }
        // 协议法，因为有可能不准确，放到最后判断
        if (isset($_SERVER['HTTP_ACCEPT'])) {
            // 如果只支持wml并且不支持html那一定是移动设备
            // 如果支持wml和html但是wml在html之前则是移动设备
            if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
                return true;
            }
        }
        return false;
    }

}
