<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Banner;
use App\Employ;

class EmployController extends Controller
{
    
     //招聘信息
     public function index(Request $request)
    {
           //文章列表
        $employ_list = DB::table('employs')->orderBy('id', 'desc')->get()->toArray();
        foreach ($employ_list as $key => $value) {
            $employ_list[$key] = (array) $value;
        }
       
         return view('/employ_list', [
             'employ_list' => $employ_list]);
    }
    
    public function detail (Request $request,$id){
        
         
         
         
         $Employ = new Employ;
         
         $employ_detail = $Employ::find($id);
         
        
        
         return view('employ_detail',[
             'employ_detail' => $employ_detail]);
    }
    
    
}
