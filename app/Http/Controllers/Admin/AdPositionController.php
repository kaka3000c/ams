<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use App\AdPosition;
class AdPositionController extends Controller
{
    
     public function index(Request $request)
    {
         $AdPosition = new AdPosition;
         $adposition_list = $AdPosition::paginate(2);
         
         //print_r($category_list);
         
         return view('admin/adposition_list', ['adposition_list' => $adposition_list]);
         
         
    }
     public function add(Request $request)
    {
         return view('admin/adposition_add');
    }
    
     public function insert(Request $request)
    {
          
          
          $position_name = $request->input('position_name');
          $ad_width = $request->input('ad_width');
          $ad_height = $request->input('ad_height');
          $position_desc = $request->input('position_desc');
          $position_style = $request->input('position_style');
          
          $AdPosition = new AdPosition;

          $AdPosition->position_name = $position_name;
          $AdPosition->ad_width = $ad_width;
          $AdPosition->ad_height = $ad_height;
          $AdPosition->position_desc = $position_desc;
          $AdPosition->position_style = $position_style;
          $AdPosition->save();
          
          
    }
    
    
      public function update(Request $request)
    {
        
    }
    
       public function delete(Request $request)
    {
        
    }
    
}
