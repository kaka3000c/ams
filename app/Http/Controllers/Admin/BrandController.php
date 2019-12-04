<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator; 
use App\Http\Controllers\Controller;
use App\Brand;
use Illuminate\Support\Facades\DB;
class BrandController extends Controller
{
    
     public function index(Request $request)
    {
         $Brand = new Brand;
         $brand_list = $Brand::paginate(2)->toArray();
         
        // print_r($brand_list);
         
         return view('admin/brand_list', ['brand_list' => $brand_list]);
         
         
    }
     public function add(Request $request)
    {
         
         return view('admin/brand_add');
    }
    
     public function insert(Request $request)
    {
           if ($request->hasFile('brand_logo')) {
            echo $file = $request->file('brand_logo');
            echo "</br>";
            echo $extension = $file->extension();
            echo "</br>";
            $image_name = date('YmdHis', time()) . "." . $extension;
            $store_result = $file->storeAs('/public/images/brand', $image_name);
        }
          
       
          $brand_name = $request->input('brand_name');
          $site_url = $request->input('site_url');
          $brand_desc = $request->input('brand_desc');
          $sort_order = $request->input('sort_order');
          $is_show = $request->input('is_show');
          
          
           $Brand = new Brand;
           $Brand->brand_name = $brand_name;
           $Brand->site_url = $site_url;
           $Brand->brand_desc = $brand_desc;
           $Brand->sort_order = $sort_order;
           $Brand->is_show = $is_show;
           
           if ($request->hasFile('brand_logo')) {
              $Brand->brand_logo = "/storage/images/brand/".$image_name;
           }
           
          //$Product->content = $content;
          $Brand->save();
    }
    
    
   public function edit(Request $request,$id)
    {
         $brand = DB::table('brands')->where('brand_id', $id)->first();
         $brand = (array)$brand;
        
         return view('admin/brand_edit',['brand' => $brand]);
    }
    public function update(Request $request)
    {
         $brand_id = $request->input('brand_id');
         $brand_name = $request->input('brand_name');
         $brand_desc = $request->input('brand_desc');
        
         
          if ($request->hasFile('brand_logo')) {
              
            $brand = DB::table('brands')->where('brand_id', $brand_id)->first();
            $brand = (array)$brand;
            $brand['brand_logo'] = str_replace('/storage/images/','/storage/app/public/images/',$brand['brand_logo']);
           
            if(isset($brand['brand_logo'])){
                 @unlink(dirname(dirname(dirname(dirname(dirname(__FILE__))))).$brand['brand_logo']);
            }
        
            echo $brand_logo = $request->file('brand_logo');
            echo "</br>";
            echo $extension = $brand_logo->extension();
            echo "</br>";
            $image_name = date('YmdHis', time()) . "." . $extension;
            $store_result = $brand_logo->storeAs('/public/images/brand/', $image_name);
        }


         DB::table('brands')->where('brand_id', $brand_id)
                 ->update(['brand_name' => $brand_name],['brand_desc' => $brand_desc]);
        
        if ($request->hasFile('brand_logo')) {
             DB::table('brands')->where('brand_id', $brand_id)
                 ->update(['brand_logo' => "/storage/images/brand/" . $image_name]);
           
        }
       
    }
    
       public function delete(Request $request,$id)
    {
        $brand = DB::table('brands')->where('brand_id', $id)->first();
        $brand = (array)$brand;
        $brand['brand_logo'] = str_replace('/storage/images/','/storage/app/public/images/',$brand['brand_logo']);
        DB::table('brands')->where('brand_id', $id)->delete();
        if(isset($brand['brand_logo'])){
            @unlink(dirname(dirname(dirname(dirname(dirname(__FILE__))))).$brand['brand_logo']);
        }
        
         
    }
    
}
