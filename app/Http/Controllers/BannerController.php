<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
class BannerController extends Controller
{
    
     //家政小程序广告
     public function index_json(Request $request)
    {
         $Banner = new Banner;
         $banner_list = $Banner::where('cat_id',1)->get();
         return $banner_list->toJson();
    }
    
    
    //拼水果小程序广告
     public function fruit_json(Request $request)
    {
         $Banner = new Banner;
         $banner_list = $Banner::where('cat_id',2)->get();
         return $banner_list->toJson();
    }
    
    
}
