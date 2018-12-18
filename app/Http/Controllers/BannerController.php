<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
class BannerController extends Controller
{
    
     public function index_json(Request $request)
    {
         $Banner = new Banner;
         $banner_list = $Banner::all();
         return $banner_list->toJson();
    }
    
    
}
