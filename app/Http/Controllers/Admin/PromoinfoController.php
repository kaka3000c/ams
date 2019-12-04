<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\PromoInfo;

class PromoinfoController extends Controller {

    
    //用户发布优惠信息管理
    public function index(Request $request) {
        
        //$Product = new Product;
        //$product_list = $Product::paginate(2);
        //$Array = Product::where('is_delete',0)->orderBy('pro_id', 'desc')->get()->toArray();
        $Array = DB::table('promo_infos')->where('status',1)->orderBy('id', 'desc')->get()->toArray();
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
        
        
        return view('admin/promoinfo_list', ['promoinfo_list' => $paginator]);
    }

    public function add(Request $request) {
        
        //列出所有商家列表
        $shop_list = DB::table('shops')->get()->toArray(); 
        foreach ($shop_list as $key => $value) {
            $shop_list[$key] = (array) $value;
        }
        
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


       return view('admin/product_add', ['category_list' => $category_list,'shop_list'=>$shop_list]);
    }

    public function insert(Request $request) {
        
        $shop_id = $request->input('shop_id');
        $shop = DB::table('shops')->where('shop_id',$shop_id)->first(); 
        $shop = (array)$shop;
        
        $shop_logo = $shop['shop_logo'];
        $shop_id  = $shop['shop_id'];
        
        $goods_name = $request->input('goods_name');
       


        if ($request->hasFile('goods_img')) {
            echo $goods_img = $request->file('goods_img');
            echo "</br>";
            echo $extension = $goods_img->extension();
            echo "</br>";
            $image_name = date('YmdHis', time()) . "." . $extension;
            $store_result = $goods_img->storeAs('/public/images/product', $image_name);
        }


        $cat_id = $request->input('cat_id');
        $brand_id = $request->input('brand_id');
        $shop_price = $request->input('shop_price');
        $market_price = $request->input('market_price');
        $virtual_sales = $request->input('virtual_sales');
        $give_integral = $request->input('give_integral');
        $rank_integral = $request->input('rank_integral');
        $integral = $request->input('integral');
        $promote_price = $request->input('promote_price');
        $promote_start_date = $request->input('promote_start_date');
        $promote_end_date = $request->input('promote_end_date');
        $goods_number = $request->input('goods_number');
        $warn_number = $request->input('warn_number');
        $is_best = $request->input('is_best');
        $is_new = $request->input('is_new');
        $is_hot = $request->input('is_hot');
        $is_on_sale = $request->input('is_on_sale');
        $is_sale = $request->input('is_sale');
        $is_alone_sale = $request->input('is_alone_sale');
        $is_shipping = $request->input('is_shipping');
        $keywords = $request->input('keywords');
        $goods_brief = $request->input('goods_brief');
        $seller_note = $request->input('seller_note');
        $content = $request->input('content');
        if(empty($is_sale)){
              $is_sale = 0;
        }
        
        $Product = new Product;

        $Product->goods_name = $goods_name;
        if ($request->hasFile('goods_img')) {
            $Product->image = "/storage/images/product/" . $image_name;
        }
        $Product->cat_id = $cat_id;
        $Product->brand_id = $brand_id;
        $Product->shop_price = $shop_price;
        $Product->market_price = $market_price;
        $Product->virtual_sales = $virtual_sales;
        $Product->give_integral = $give_integral;
        $Product->rank_integral = $rank_integral;
        $Product->integral = $integral;
        $Product->promote_price = $promote_price;
        $Product->promote_start_date = $promote_start_date;
        $Product->promote_end_date = $promote_end_date;
        $Product->promote_end_date = $promote_end_date;
        $Product->goods_number = $goods_number;
        $Product->warn_number = $warn_number;
        $Product->is_best = $is_best;
        $Product->is_new = $is_new;
        $Product->is_hot = $is_hot;
        $Product->is_on_sale = $is_on_sale;
        $Product->is_sale = $is_sale;
        $Product->is_alone_sale = $is_alone_sale;
        $Product->is_shipping = $is_shipping;
        $Product->keywords = $keywords;
        $Product->goods_brief = $goods_brief;
        $Product->seller_note = $seller_note;
        $Product->shop_logo = $shop_logo;
        $Product->shop_id = $shop_id;
        $Product->content = $content;
        $Product->save();
        
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
        return view('admin/product_edit', ['category_list' => $category_list,'product' =>$product ]);
    }
    
    public function update(Request $request) {
        
        $pro_id = $request->input('pro_id');
        $goods_name = $request->input('goods_name');
        $content = $request->input('content');
        $cat_id = $request->input('cat_id');
        $is_sale = $request->input('is_sale');
        if ( $is_sale == "on"){
            $is_sale = 1;
        }else{
            $is_sale = 0;
        }
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
                ,'content' => $content ,'cat_id' => $cat_id ,'is_sale' => $is_sale 
            ]);
        
        if ($request->hasFile('goods_img')) {
             DB::table('products')->where('pro_id', $pro_id)
                 ->update(['image' => "/storage/images/prodcut/" . $image_name]);
           
        }
        echo "修改成功";
    }

     //信息上架
    public function on_show(Request $request,$id) {
        
        DB::table('promo_infos')->where('id', $id)->update(['status' => 1]);
    }
    
    //取消回收站
    public function off_show(Request $request,$id) {
        
        DB::table('promo_infos')->where('id', $id)->update(['status' => 0]);
    }
    
    //放入回收站
    public function delete(Request $request,$id) {
        
        DB::table('promo_infos')->where('id', $id)->update(['status' => 0]);
    }
    
    //确定删除
    public function real_del(Request $request,$id) {
       
            
            $promo_info = DB::table('promo_infos')->where('id', $id)->first();
            $promo_info = (array)$promo_info;
            $promo_info['images'] = str_replace('/storage/images/','/storage/app/public/images/',$promo_info['images']);
            if(!empty($promo_info['images'])){
                 @unlink(dirname(dirname(dirname(dirname(dirname(__FILE__))))).$promo_info['images']);
            }
            $product = DB::table('promo_infos')->where('id', $id)->delete();
           
    }
    public function batch_del(Request $request) {
        
        $pro_id_array = $request->input('pro_id');
       
        
         for ($i=0; $i<count($pro_id_array); $i++) {
              DB::table('products')->where('pro_id', $pro_id_array[$i])->delete();
         }
          echo "批量删除成功";
        
    }
    
    //取消回收站
    public function cancel_del(Request $request,$id) {
        
        DB::table('products')->where('pro_id', $id)->update(['is_delete' => 0]);
    }
    
   //回收站商品列表
    public function trash(Request $request) {
       
        $Array = DB::table('promo_infos')->where('status',0)->orderBy('id', 'desc')->get()->toArray(); 
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
        
        
        return view('admin/promoinfo_trash', ['promoinfo_list' => $paginator]);
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
        
        
        return view('admin/product_list', ['product_list' => $paginator]);
         
     }
}
