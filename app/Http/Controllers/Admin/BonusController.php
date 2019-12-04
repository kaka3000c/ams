<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\BonusType;

class BonusController extends Controller
{
    
     public function index(Request $request)
    {
         $BonusType = new BonusType;
         $bonustype_list = $BonusType::paginate(2);
         
        // print_r($bonustype_list);
         
         return view('admin/bonustype_list', ['bonustype_list' => $bonustype_list]);
         
         
    }
     public function add(Request $request)
    {
         return view('admin/bonus_add');
    }
    
     public function insert(Request $request)
    {
          
         $type_name = $request->input('type_name');
         $type_money  = $request->input('type_money');
         $min_goods_amount  = $request->input('min_goods_amount');
         $send_type  = $request->input('send_type');
         $send_start_date  = $request->input('send_start_date');
         $send_end_date = $request->input('send_end_date');
         $use_start_date  = $request->input('use_start_date');
         $use_end_date  = $request->input('use_end_date');
          
         $BonusType = new BonusType;
         $BonusType->type_name = $type_name;
         $BonusType->type_money = $type_money;
         $BonusType->min_goods_amount = $min_goods_amount;
         $BonusType->send_type = $send_type;
         $BonusType->send_start_date = $send_start_date;
         $BonusType->send_start_date = $send_start_date;
         $BonusType->use_start_date = $use_start_date;
         $BonusType->use_end_date = $use_end_date;
         
         $BonusType->save();
    }
    
    public function edit(Request $request,$id)
    {
        
         $bonus_type = DB::table('bonus_types')->where('type_id', $id)->first();
         $bonus_type = (array)$bonus_type;
        
         
         return view('admin/bonus_edit',['bonus_type' => $bonus_type]);
    }
    
    
      public function update(Request $request)
    {
        
    }
    
       public function delete(Request $request)
    {
        
    }
    
}
