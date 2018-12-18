<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use App\Banner;
class BannerController extends Controller
{
    
     public function index(Request $request)
    {
         $Banner = new Banner;
         $banner_list = $Banner::all();
         //print_r($product_list);
         $name = 666;
         return view('admin/banner_list', ['banner_list' => $banner_list]);
    }
     public function add(Request $request)
    {
         return view('admin/banner_add');
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
          $Banner = new Banner;

          $Banner->name = $name;
          $Banner->image = "/storage/images/banner/".$image_name;
          //$Product->content = $content;
          $Banner->save();
    }
    
    
      public function update(Request $request)
    {
        
    }
    
       public function delete(Request $request)
    {
        
    }
    
}