<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator; 
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Shop;
class ShopController extends Controller
{
     public function index(Request $request)
    {
         $Shop = new Shop;
         $Array = $Shop::get()->toArray();
       
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

      return view('admin/shop_list', ['shop_list' => $paginator]);
         
         
    }
    
     public function add(Request $request)
    {
         
         return view('admin/shop_add');
    }
    
    
    public function insert(Request $request) {
       

        if ($request->hasFile('shop_logo')) {
            echo $shop_logo = $request->file('shop_logo');
            echo "</br>";
            echo $extension = $shop_logo->extension();
            echo "</br>";
            $image_name = date('YmdHis', time()) . "." . $extension;
            $store_result = $shop_logo->storeAs('/public/images/shop/', $image_name);
        }


        $shop_name= $request->input('shop_name');
        $mobile= $request->input('mobile');
        $contact = $request->input('contact');
        
        
        $Shop = new Shop;

        
        if ($request->hasFile('shop_logo')) {
            $Shop->shop_logo = "/storage/images/shop/" . $image_name;
        }
        $Shop->shop_name = $shop_name;
        $Shop->mobile = $mobile;
        $Shop->contact = $contact;
       
        $Shop->save();
    }
    public function edit(Request $request,$id)
    {
         $shop = DB::table('shops')->where('shop_id', $id)->first();
         $shop = (array)$shop;
        
         return view('admin/shop_edit',['shop' => $shop]);
    }
    public function update(Request $request)
    {
         $shop_id = $request->input('shop_id');
         $shop_name= $request->input('shop_name');
         $mobile= $request->input('mobile');
         $contact = $request->input('contact');
         
          if ($request->hasFile('shop_logo')) {
              
            $shop = DB::table('shops')->where('shop_id', $shop_id)->first();
            $shop = (array)$shop;
            $shop['shop_logo'] = str_replace('/storage/images/','/storage/app/public/images/',$shop['shop_logo']);
           
            if(isset($shop['shop_logo'])){
                 @unlink(dirname(dirname(dirname(dirname(dirname(__FILE__))))).$shop['shop_logo']);
            }
        
            echo $shop_logo = $request->file('shop_logo');
            echo "</br>";
            echo $extension = $shop_logo->extension();
            echo "</br>";
            $image_name = date('YmdHis', time()) . "." . $extension;
            $store_result = $shop_logo->storeAs('/public/images/shop/', $image_name);
        }


         DB::table('shops')->where('shop_id', $shop_id)
                 ->update(['shop_name' => $shop_name],['mobile' => $mobile],['contact' => $contact]);
        
        if ($request->hasFile('shop_logo')) {
             DB::table('shops')->where('shop_id', $shop_id)
                 ->update(['shop_logo' => "/storage/images/shop/" . $image_name]);
           
        }
       
    }
    public function delete(Request $request,$id)
    {
        $shop = DB::table('shops')->where('shop_id', $id)->first();
        $shop = (array)$shop;
        $shop['shop_logo'] = str_replace('/storage/images/','/storage/app/public/images/',$shop['shop_logo']);
        DB::table('shops')->where('shop_id', $id)->delete();
        if(isset($shop['shop_logo'])){
            @unlink(dirname(dirname(dirname(dirname(dirname(__FILE__))))).$shop['shop_logo']);
        }
        
         
    }
}