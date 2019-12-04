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
         $Array = $Shop::orderBy('shop_id', 'desc')->get()->toArray();
       
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
        if ($request->hasFile('qr_code')) {
            echo $qr_code = $request->file('qr_code');
            echo "</br>";
            echo $extension = $qr_code->extension();
            echo "</br>";
            $qr_code_image_name = date('YmdHis', time()) . "qr_code." . $extension;
            $store_result = $shop_logo->storeAs('/public/images/qr_code/', $qr_code_image_name);
        }

        $shop_name= $request->input('shop_name');
        $mobile= $request->input('mobile');
        $weixing= $request->input('weixing');
        
        $address = $request->input('address');
         $contact = $request->input('contact');
        $shop_brief = $request->input('shop_brief');
        $Shop = new Shop;

        
        if ($request->hasFile('shop_logo')) {
            $Shop->shop_logo = "/storage/images/shop/" . $image_name;
        }
        if ($request->hasFile('qr_code')) {
            $Shop->qr_code = "/storage/images/qr_code/" . $qr_code_image_name;
        }
        $Shop->shop_name = $shop_name;
        $Shop->mobile = $mobile;
        $Shop->contact = $contact;
        $Shop->weixing = $weixing;
        $Shop->contact = $contact;
        $Shop->address = $address;
        $Shop->shop_brief = $shop_brief;
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
         $mobile = $request->input('mobile');
         $contact = $request->input('contact');
         $weixing= $request->input('weixing');
         $address = $request->input('address');
         $shop_brief = $request->input('shop_brief');
        
         
          //更新商家logo
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
        //更新商家二维码
        if ($request->hasFile('qr_code')) {
              
            $shop = DB::table('shops')->where('shop_id', $shop_id)->first();
            $shop = (array)$shop;
            $shop['qr_code'] = str_replace('/storage/images/','/storage/app/public/images/',$shop['qr_code']);
           
            if(isset($shop['qr_code'])){
                 @unlink(dirname(dirname(dirname(dirname(dirname(__FILE__))))).$shop['qr_code']);
            }
        
            echo $shop_qr_code = $request->file('qr_code');
            echo "</br>";
            echo $extension = $shop_qr_code->extension();
            echo "</br>";
            $qr_code_image_name = date('YmdHis', time()) . "qr_code." . $extension;
            $store_result = $shop_logo->storeAs('/public/images/qr_code/', $qr_code_image_name);
        }


         DB::table('shops')->where('shop_id', $shop_id)
                 ->update(['shop_name' => $shop_name,'mobile' => $mobile, 'weixing'=> $weixing , 'address' => $address,'contact' => $contact
                         ,'shop_brief' => $shop_brief]);
        
        if ($request->hasFile('shop_logo')) {
             DB::table('shops')->where('shop_id', $shop_id)
                 ->update(['shop_logo' => "/storage/images/shop/" . $image_name]);
           
        } 
        if ($request->hasFile('qr_code')) {
             DB::table('shops')->where('shop_id', $shop_id)
                 ->update(['qr_code' => "/storage/images/qr_code/" . $qr_code_image_name]);
           
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
         if(isset($shop['qr_code'])){
            @unlink(dirname(dirname(dirname(dirname(dirname(__FILE__))))).$shop['qr_code']);
        }
        
         
    }
    
    //商家登录
    public function login(Request $request)
    {
        
        return view('admin/shop_login');
    }
    
    //商家登录验证
    public function sign(Request $request)
    {
        
         $mobile = $request->input('mobile');
          
         $password = md5($request->input('password'));
         
          $shop = DB::table('shops')->where('mobile', $mobile)->where('password', $password)->first();
          $shop = (array)$shop;
         
          if(!empty($shop)){
               $request->session()->put('mobile', $mobile);
               return redirect('/admin/shop/manager');
          }else{
               echo "登录失败";
          }
         
    }
    
     //商家管理首页
    public function manager(Request $request)
    {
        
        return view('admin/shop_manager');
    }
    
}