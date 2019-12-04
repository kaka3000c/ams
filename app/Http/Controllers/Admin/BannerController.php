<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator; 
use App\Http\Controllers\Controller;
use App\Banner;
use App\AdPosition;
use Illuminate\Support\Facades\DB;
class BannerController extends Controller
{
    
     public function index(Request $request)
    {
         
         $Banner = new Banner;
         $Array = $Banner::get()->toArray();
         
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
         
         
         
         return view('admin/banner_list', ['banner_list' => $paginator]);
         
    }
     public function add(Request $request)
    {
         
         $AdPosition = new AdPosition;
         $adposition_list = $AdPosition::get()->toArray();
        
         
         return view('admin/banner_add', ['adposition_list' => $adposition_list]);
    }
    
     public function insert(Request $request)
    {
          
          echo $photo = $request->file('photo');
          echo "</br>";
          echo $extension = $photo->extension();
          echo "</br>";

 $image_name = date('YmdHis', time()).".".$extension;
$store_result = $photo->storeAs('/public/images/banner', $image_name);
        $output = [
            'extension' => $extension,
            'store_result' => $store_result
        ];
       
        print_r($output);
          if ($request->hasFile('photo')) {
    
        }
          $name = $request->input('name');
          $media_type = $request->input('media_type');
          $position_id = $request->input('position_id');
          $start_time = $request->input('start_time');
          $end_time = $request->input('end_time');
          $ad_link = $request->input('ad_link');
          $enabled = $request->input('enabled');
          $link_man = $request->input('link_man');
          $link_email = $request->input('link_email');
          $link_phone = $request->input('link_phone');
          
          $Banner = new Banner;
          $Banner->name = $name;
          $Banner->position_id = $position_id;
          $Banner->media_type = $media_type;
          $Banner->start_time = $start_time;
          $Banner->end_time = $end_time;
          $Banner->ad_link = $ad_link;
          $Banner->enabled = $enabled;
          $Banner->link_man = $link_man;
          $Banner->link_email = $link_email;
          $Banner->link_phone = $link_phone;
          
          
          $Banner->image = "/storage/images/banner/".$image_name;
          //$Product->content = $content;
          $Banner->save();
    }
    
    
     public function edit(Request $request,$id)
    {
         $banner = DB::table('banners')->where('banner_id', $id)->first();
         $banner = (array)$banner;
        
         return view('admin/banner_edit',['banner' => $banner]);
    }
    public function update(Request $request)
    {
         $banner_id = $request->input('banner_id');
         $name = $request->input('name');
         $content = $request->input('content');
         $ad_link = $request->input('ad_link');
       
          if ($request->hasFile('image')) {
              
            $banner = DB::table('banners')->where('banner_id', $banner_id)->first();
            $banner = (array)$banner;
            $banner['image'] = str_replace('/storage/images/','/storage/app/public/images/',$banner['image']);
           
            if(isset($banner['image'])){
                 @unlink(dirname(dirname(dirname(dirname(dirname(__FILE__))))).$banner['image']);
            }
        
            echo $image = $request->file('image');
            echo "</br>";
            echo $extension = $image->extension();
            echo "</br>";
            $image_name = date('YmdHis', time()) . "." . $extension;
            $store_result = $image->storeAs('/public/images/banner/', $image_name);
        }


         DB::table('banners')->where('banner_id', $banner_id)
                 ->update(['name' => $name,'ad_link' => $ad_link],['content' => $content],[]);
        
        if ($request->hasFile('image')) {
             DB::table('banners')->where('banner_id', $banner_id)
                 ->update(['image' => "/storage/images/banner/" . $image_name]);
           
        }
       
    }
    
    public function delete(Request $request,$id)
    {
        $banner = DB::table('banners')->where('banner_id', $id)->first();
        $banner = (array)$banner;
        $banner['image'] = str_replace('/storage/images/','/storage/app/public/images/',$banner['image']);
        DB::table('banners')->where('banner_id', $id)->delete();
        if(isset($banner['image'])){
            @unlink(dirname(dirname(dirname(dirname(dirname(__FILE__))))).$banner['image']);
        }
        
         
    }
    
     //商品上架
    public function on_enable(Request $request,$id) {
        
        DB::table('banners')->where('banner_id', $id)->update(['enabled' => 1]);
    }
    
    //取消回收站
    public function off_enable(Request $request,$id) {
        
        DB::table('banners')->where('banner_id', $id)->update(['enabled' => 0]);
    }
    
}