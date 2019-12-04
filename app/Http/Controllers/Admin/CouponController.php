<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator; 
use App\Http\Controllers\Controller;
use App\Coupon;
use Illuminate\Support\Facades\DB;


//优惠劵
class CouponController extends Controller
{
    
     public function index(Request $request)
    {
         $Coupon = new Coupon;
         $coupon_list = $Coupon::paginate(10);
         
        // print_r($coupon_list);
         
         return view('admin/coupon_list', ['coupon_list' => $coupon_list]);
         
         
    }
     public function add(Request $request)
    {
         return view('admin/coupon_add');
    }
    
     public function insert(Request $request)
    {
          
          $img = $request->file('img');
          
          $extension = $img->extension();
          

         $image_name = date('YmdHis', time()).".".$extension;
         $store_result = $img->storeAs('/public/images/coupon', $image_name);
         $output = [
            'extension' => $extension,
            'store_result' => $store_result
         ];
         
         $coupon_name = $request->input('coupon_name');
         $coupon_money = $request->input('coupon_money');
         $full_money = $request->input('full_money');
         $coupon_number = $request->input('coupon_number');
         $coupon_start_time = $request->input('coupon_start_time');
         $coupon_end_time = $request->input('coupon_end_time');
         $coupon_start_period = $request->input('coupon_start_period');
         $coupon_end_period = $request->input('coupon_end_period');
         $coupon_remarks = $request->input('coupon_remarks');
         
         $Coupon = new Coupon;
         
         $Coupon->coupon_name = $coupon_name;
         $Coupon->coupon_money = $coupon_money;
         $Coupon->full_money = $full_money;
         $Coupon->coupon_number = $coupon_number;
         $Coupon->coupon_start_time = $coupon_start_time;
         $Coupon->coupon_end_time = $coupon_end_time;
         $Coupon->coupon_start_period = $coupon_start_period;
         $Coupon->coupon_end_period = $coupon_end_period;
         $Coupon->coupon_remarks = $coupon_remarks;
         $Coupon->coupon_status = 1;  //0已冻结，1正常使用
         $Coupon->img = "/storage/images/coupon/".$image_name;
         $Coupon->save();
    }
    
    public function edit(Request $request,$id)
    {
        
         $coupon = DB::table('coupons')->where('coupon_id', $id)->first();
         $coupon = (array)$coupon;
        
         
         return view('admin/coupon_edit',['coupon' => $coupon]);
    }
    
    
      public function update(Request $request)
    {
        
    }
    
       public function delete(Request $request)
    {
        
    }
}