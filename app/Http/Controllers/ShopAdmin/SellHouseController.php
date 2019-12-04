<?php

namespace App\Http\Controllers\ShopAdmin;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\SellHouse;
class SellHouseController extends Controller {

    public function index(Request $request) {
        
        
        $shop_id = $request->session()->get('shop_id');
        
       
        //$Product = new Product;
        //$product_list = $Product::paginate(2);
        //$Array = Product::where('is_delete',0)->orderBy('pro_id', 'desc')->get()->toArray();
        $Array = DB::table('sell_houses')->where('shop_id',$shop_id)->orderBy('id', 'desc')->get()->toArray();
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
        
        
        return view('shopadmin/sellhouse_list', ['product_list' => $paginator]);
    }

    public function add(Request $request) {
        
          return view('shopadmin/sellhouse_add');
          
    }

    public function insert(Request $request) {
        
      
        $shop_id = $request->session()->get('shop_id');
       
        $shop = DB::table('shops')->where('shop_id',$shop_id)->first(); 
        $shop = (array)$shop;
       
        $shop_logo = $shop['shop_logo'];
        $shop_id  = $shop['shop_id'];
        
        $title = $request->input('title');
        $mobile = $request->input('mobile');
        $contacts = $request->input('contacts');


        if ($request->hasFile('goods_img')) {
            echo $goods_img = $request->file('goods_img');
            echo "</br>";
            echo $extension = $goods_img->extension();
            echo "</br>";
            $image_name = date('YmdHis', time()) . "." . $extension;
            $store_result = $goods_img->storeAs('/public/images/sellhouse', $image_name);
        }


     
        $content = $request->input('content');
        
        $SellHouse = new SellHouse;

        $SellHouse->title = $title;
        if ($request->hasFile('goods_img')) {
            $SellHouse->images = "/storage/images/sellhouse/" . $image_name;
        }
        
        $SellHouse->mobile = $mobile;
        $SellHouse->contacts = $contacts;
        $SellHouse->content = $content;
        $SellHouse->shop_id = $shop_id;
        $SellHouse->is_show = 0;
        $SellHouse->save();
        echo "添加成功";
        
        
    }

    public function edit(Request $request,$id) {
       
        $house = DB::table('sell_houses')->where('id',$id)->first(); 
        $house = (array)$house;
        
        return view('shopadmin/sellhouse_edit', ['house' => $house]);
         
         
    }
    
    public function update(Request $request) {
        
        $id = $request->input('id');
        $title = $request->input('title');
        $content = $request->input('content');
        $mobile = $request->input('mobile');
        $contacts = $request->input('contacts');
        
         if ($request->hasFile('goods_img')) {
              
            $house = DB::table('sell_houses')->where('id', $id)->first();
            $house = (array)$house;
            $house['image'] = str_replace('/storage/images/','/storage/app/public/images/',$house['image']);
           
            if(isset($house['image'])){
                 @unlink(dirname(dirname(dirname(dirname(dirname(__FILE__))))).$house['image']);
            }
        
            echo $goods_img = $request->file('goods_img');
            echo "</br>";
            echo $extension = $goods_img->extension();
            echo "</br>";
            $image_name = date('YmdHis', time()) . "." . $extension;
            $store_result = $goods_img->storeAs('/public/images/sellhouse/', $image_name);
        }
        
        DB::table('sell_houses')->where('id', $id)->update(['title' => $title
                ,'content' => $content ,'mobile' => $mobile  ,'contacts' => $contacts
            ]);
        
        if ($request->hasFile('goods_img')) {
             DB::table('sell_houses')->where('id', $id)
                 ->update(['image' => "/storage/images/sellhouse/" . $image_name]);
           
        }
        
    }

     //商品上架
    public function on_sale(Request $request,$id) {
        
        DB::table('products')->where('pro_id', $id)->update(['is_on_sale' => 1]);
    }
    
    //取消回收站
    public function off_sale(Request $request,$id) {
        
        DB::table('products')->where('pro_id', $id)->update(['is_on_sale' => 0]);
    }
    
    //放入回收站
    public function delete(Request $request,$id) {
        
        DB::table('products')->where('pro_id', $id)->update(['is_delete' => -1]);
    }
    
    //取消回收站
    public function cancel_del(Request $request,$id) {
        
        DB::table('products')->where('pro_id', $id)->update(['is_delete' => 0]);
    }
     
        //确定删除
    public function real_del(Request $request,$id) {
       
            
            $house = DB::table('sell_houses')->where('id', $id)->first();
            $house = (array)$house;
            $house['images'] = str_replace('/storage/images/','/storage/app/public/images/',$house['images']);
            if(!empty($house['images'])){
                 @unlink(dirname(dirname(dirname(dirname(dirname(__FILE__))))).$house['images']);
            }
            $house = DB::table('sell_houses')->where('id', $id)->delete();
            echo "删除成功";
           
    }
   
   //回收站商品列表
    public function trash(Request $request) {
        
         $shop_id = $request->session()->get('shop_id');
        
          $Product = new Product;
        //$product_list = $Product::paginate(2);
        $Array = Product::where('is_delete',-1)->where('shop_id',$shop_id)->orderBy('pro_id', 'desc')->get()->toArray();
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
        
        
        return view('shopadmin/sellhouse_trash', ['product_list' => $paginator]);
    }
    
     public function search(Request $request) {
         
         $is_on_sale = $request->input('is_on_sale');
        
         $keyword = $request->input('keyword');
         
         $Array = DB::table('products');
          if(isset($is_on_sale)){
              
              $Array =  $Array->where('is_on_sale',$is_on_sale);
          }
          if(isset($keyword)){
              
              $Array =  $Array->where('goods_name','like','%' . $keyword . '%');
          }
          $Array = $Array->where('is_delete',0)->orderBy('pro_id', 'desc')->get()->toArray();
          foreach ($Array as $key => $value) {
              $Array[$key] = (array)$value;
          }

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
        
        
        return view('shopadmin/sellhouse_list', ['product_list' => $paginator]);
         
     }
}
