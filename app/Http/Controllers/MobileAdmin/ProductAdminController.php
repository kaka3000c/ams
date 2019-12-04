<?php

namespace App\Http\Controllers\MobileAdmin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Product;
use App\Shop;
use App\Banner;
use Illuminate\Support\Facades\DB;



class ProductAdminController extends Controller
{
    
    //产品列表
    public function index(Request $request)
    {
        
        //读取service_users表的id，存为service_user_id
         $service_user_id = $request->session()->get('service_user_id');
      
         $service_user = DB::table('service_users')->where('id', $service_user_id)->first();
         $service_user = (array)$service_user;
         $shop_id = $service_user['shop_id'];
         $shop = DB::table('shops')->where('shop_id', $shop_id)->first();
         $shop = (array)$shop;
         
         if (empty($service_user['shop_id'])){
             //还没有开店
             return "店铺还没有开通";
            
             
         }else{
             //已成功开店
             
                     
             //读取该店铺的产品信息列表
              $Array = DB::table('products')->where('is_delete',0)->where('shop_id',$shop_id)->orderBy('pro_id', 'desc')->get()->toArray();
        foreach ($Array as $key => $value) {
            $Array[$key] = (array)$value;
        }
        //print_r($product_list->toArray());

        //分页
      $perPage = 10;            //每页显示数量
      if ($request->has('page')) {
            $current_page = $request->input('page');
            $current_page = $current_page <= 0 ? 1 :$current_page;
       } else {
            $current_page = 1;
      }
      $item = array_slice($Array, ($current_page-1)*$perPage, $perPage);//$Array为要分页的数组
      $totals = count($Array);
      $paginator =new LengthAwarePaginator($item, $totals, $perPage, $current_page, [
             'path' => Paginator::resolveCurrentPath(),
             'pageName' => 'page',
      ]);
        
        
        return view('/mobileadmin/product', ['product_list' => $paginator,'shop' => $shop]);
        
             
       }
         
    }
    
    //添加产品
    public function add(Request $request){
        
         
         return view('/mobileadmin/product_add');
    }
    
    //添加产品
    public function insert(Request $request){
         
        
        //读取service_users表的id，存为service_user_id
         $service_user_id = $request->session()->get('service_user_id');
         $service_user = DB::table('service_users')->where('id', $service_user_id)->first();
         $service_user = (array)$service_user;
         $shop_id = $service_user['shop_id'];
         
         $shop = DB::table('shops')->where('shop_id',$shop_id)->first(); 
         $shop = (array)$shop;
         $shop_logo = $shop['shop_logo'];
         
         
         $file = $request->file('photo');//获取图片
        
         $allowed_extensions = ["png", "jpg", "gif","jpeg","PNG", "JPG", "GIF","JPEG"];
         
        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
            return response()->json([
                'status' => false,
                'message' => '只能上传 png | jpg | gif | jpeg 格式的图片'
            ]);
        }
        
        $destinationPath = '../storage/app/public/images/product';
        $extension = $file->getClientOriginalExtension();
        $fileName = str_random(10).'.'.$extension;
        
        $file->move($destinationPath, $fileName);
        
        $goods_name = $request->input('goods_name');
        
         $Product = new Product;

        $Product->goods_name = $goods_name;
        $Product->shop_id = $shop_id;
        $Product->shop_logo = $shop_logo;
        if ($request->hasFile('photo')) {
            $Product->image = "/storage/images/product/" . $fileName;
        }
        $Product->save();
        
        echo "添加成功";
        
    }
    
    //编辑产品
    public function  edit(Request $request){
        
         
           return view('/mobileadmin/product_edit');
        
    }
    //编辑产品
    public function  update(Request $request){
        
         
           
        
    }
    
    
    
}
