<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator; 
use App\Http\Controllers\Controller;
use App\Banner;
use App\HotelStore;
use App\AdPosition;
use Illuminate\Support\Facades\DB;
class HotelStoreController extends Controller
{
    
     public function index(Request $request)
    {
          $Array = DB::table('hotel_stores')->get()->toArray();
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
         
         
         
         return view('admin/hotel_store_list', ['hotel_store_list' => $paginator]);
         
    }
     public function add(Request $request)
    {
         
         
        
         
         return view('admin/hotel_store_add');
    }
    
     public function insert(Request $request)
    {
          
          echo $logo = $request->file('logo');
          echo "</br>";
          echo $extension = $logo->extension();
          echo "</br>";

 $image_name = date('YmdHis', time()).".".$extension;
$store_result = $logo->storeAs('/public/images/hotel_store', $image_name);
        $output = [
            'extension' => $extension,
            'store_result' => $store_result
        ];
       
        print_r($output);
          if ($request->hasFile('logo')) {
    
        }
          $name = $request->input('name');
          $address = $request->input('address');
          $mobile = $request->input('mobile');
          
          
          $HotelStore = new HotelStore;
          $HotelStore->name = $name;
          $HotelStore->address = $address;
          $HotelStore->mobile = $mobile;
         
          
          
          $HotelStore->logo = "/storage/images/hotel_store/".$image_name;
          
          $HotelStore->save();
    }
    
    
     public function edit(Request $request,$id)
    {
         $hotel_store = DB::table('hotel_stores')->where('store_id', $id)->first();
         $hotel_store = (array)$hotel_store;
        
         return view('admin/hotel_store_edit',['hotel_store' => $hotel_store]);
    }
    
    
    public function update(Request $request)
    {
         $store_id = $request->input('store_id');
         $name = $request->input('name');
         $address = $request->input('address');
         $mobile = $request->input('mobile');
         
          if ($request->hasFile('logo')) {
              
            $hotel_store = DB::table('hotel_stores')->where('store_id', $store_id)->first();
            $hotel_store = (array)$hotel_store;
            $hotel_store['logo'] = str_replace('/storage/hotel_store/','/storage/app/public/hotel_store/',$hotel_store['logo']);
           
            if(isset($hotel_store['logo'])){
                 @unlink(dirname(dirname(dirname(dirname(dirname(__FILE__))))).$hotel_store['logo']);
            }
        
            echo $logo = $request->file('logo');
            echo "</br>";
            echo $extension = $logo->extension();
            echo "</br>";
            $image_name = date('YmdHis', time()) . "." . $extension;
            $store_result = $logo->storeAs('/public/images/hotel_store/', $image_name);
        }


         DB::table('hotel_stores')->where('store_id', $store_id)
                 ->update(['name' => $name],['address' => $address],['mobile' => $mobile]);
        
        if ($request->hasFile('logo')) {
             DB::table('hotel_stores')->where('store_id', $store_id)
                 ->update(['logo' => "/storage/images/hotel_store/" . $image_name]);
           
        }
       
    }
    
    public function delete(Request $request,$id)
    {
        $hotel_store = DB::table('hotel_stores')->where('store_id', $id)->first();
        $hotel_store = (array)$hotel_store;
        $hotel_store['logo'] = str_replace('/storage/images/','/storage/app/public/images/',$hotel_store['logo']);
        
        if(isset($hotel_store['logo'])){
            @unlink(dirname(dirname(dirname(dirname(dirname(__FILE__))))).$hotel_store['logo']);
        }
        DB::table('hotel_stores')->where('store_id', $id)->delete();
        
        
         
    }
    
  
    
}