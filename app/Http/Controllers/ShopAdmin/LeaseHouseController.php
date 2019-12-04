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
use App\LeaseHouse;

class LeaseHouseController extends Controller {

    public function index(Request $request) {
        
        
        $shop_id = $request->session()->get('shop_id');
       
       
        //$Product = new Product;
        //$product_list = $Product::paginate(2);
        //$Array = Product::where('is_delete',0)->orderBy('pro_id', 'desc')->get()->toArray();
        $Array = DB::table('lease_houses')->where('shop_id',$shop_id)->orderBy('id', 'desc')->get()->toArray();
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
        
      
        return view('shopadmin/leasehouse_list', ['product_list' => $paginator]);
    }

    public function add(Request $request) {
        
       return view('shopadmin/leasehouse_add');
       
       
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
            $store_result = $goods_img->storeAs('/public/images/leasehouse', $image_name);
        }


     
        $content = $request->input('content');
        
        $LeaseHouse = new LeaseHouse;

        $LeaseHouse->title = $title;
        if ($request->hasFile('goods_img')) {
            $LeaseHouse->images = "/storage/images/leasehouse/" . $image_name;
        }
        
        $LeaseHouse->mobile = $mobile;
        $LeaseHouse->contacts = $contacts;
        $LeaseHouse->content = $content;
        $LeaseHouse->shop_id = $shop_id;
        $LeaseHouse->is_show = 0;
        $LeaseHouse->save();
        echo "添加成功";


    }

    public function edit(Request $request,$id) {
       
        $product = DB::table('products')->where('pro_id',$id)->first(); 
        $product = (array)$product;
        
         //列出所有子分类
        $categorys = DB::table('categories')->get()->toArray(); 
        foreach ($categorys as $key => $value) {
            $categorys[$key] = (array) $value;
        }
        function getSubs($categorys, $catId = 0, $level = 0) {

            $subs = array();
            foreach ($categorys as $item) {
                if ($item['parent_id'] == $catId) {
                    $item['level'] = $level;
                    $subs[] = $item;
                    $subs = array_merge($subs, getSubs($categorys, $item['cat_id'], $level + 1));
                }
            }
             return $subs;
        }
        $result = getSubs($categorys, 0);
        $category_list = array();
        foreach ($result as $item) {
            
           $option = array();
            $option['cat_id'] = $item['cat_id'];
             $option['cat_name'] = str_repeat('----', $item['level']) . $item['cat_name'];
             $category_list[] = $option;
        }
        return view('shopadmin/leasehouse_edit', ['category_list' => $category_list,'product' =>$product ]);
    }
    
    public function update(Request $request) {
        
        $pro_id = $request->input('pro_id');
        $goods_name = $request->input('goods_name');
        $content = $request->input('content');
        $cat_id = $request->input('cat_id');
         if ($request->hasFile('goods_img')) {
              
            $product = DB::table('products')->where('pro_id', $pro_id)->first();
            $product = (array)$product;
            $product['image'] = str_replace('/storage/images/','/storage/app/public/images/',$product['image']);
           
            if(isset($product['image'])){
                 @unlink(dirname(dirname(dirname(dirname(dirname(__FILE__))))).$product['image']);
            }
        
            echo $goods_img = $request->file('goods_img');
            echo "</br>";
            echo $extension = $goods_img->extension();
            echo "</br>";
            $image_name = date('YmdHis', time()) . "." . $extension;
            $store_result = $goods_img->storeAs('/public/images/prodcut/', $image_name);
        }
        
        DB::table('products')->where('pro_id', $pro_id)->update(['goods_name' => $goods_name
                ,'content' => $content ,'cat_id' => $cat_id 
            ]);
        
        if ($request->hasFile('goods_img')) {
             DB::table('products')->where('pro_id', $pro_id)
                 ->update(['image' => "/storage/images/prodcut/" . $image_name]);
           
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
       
            
            $house = DB::table('lease_houses')->where('id', $id)->first();
            $house = (array)$house;
            $house['images'] = str_replace('/storage/images/','/storage/app/public/images/',$house['images']);
            if(!empty($house['images'])){
                 @unlink(dirname(dirname(dirname(dirname(dirname(__FILE__))))).$house['images']);
            }
            $house = DB::table('lease_houses')->where('id', $id)->delete();
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
        
        
        return view('shopadmin/leasehouse_trash', ['product_list' => $paginator]);
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
        
        
        return view('shopadmin/leasehouse_list', ['product_list' => $paginator]);
         
     }
}
