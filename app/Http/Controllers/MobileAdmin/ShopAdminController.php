<?php

namespace App\Http\Controllers\MobileAdmin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Shop;
use App\Banner;
use Illuminate\Support\Facades\DB;



class ShopAdminController extends Controller
{
    
    //商家店铺
    public function index(Request $request)
    {
        
        //读取service_users表的id，存为service_user_id
         $service_user_id = $request->session()->get('service_user_id');
      
         $service_user = DB::table('service_users')->where('id', $service_user_id)->first();
         $service_user = (array)$service_user;
         if (empty($service_user['shop_id'])){
             //还没有开店
             return view('/mobile/shop_status');
            
             
         }else{
             //已成功开店
             //读取店铺信息
             $shop_detail = Shop::where('shop_id', $service_user['shop_id'])->first()->toArray();
             
             
             
             return view('/mobileadmin/shop' , ['shop' => $shop_detail]);
             
         }
         
    }
    
    //申请开通店铺
    public function apply_shop(Request $request){
        
         //读取service_users表的id，存为service_user_id
        $service_user_id = $request->session()->get('service_user_id');
        $service_user = DB::table('service_users')->where('id', $service_user_id)->first();
        $service_user = (array)$service_user;
        
        if (empty($service_user['shop_id'])){
            
             return view('/mobileadmin/apply_shop');
        }else{
            
            
            return redirect('/mobile/shopadmin/');
        }
        
        
        
    }
    
    //提交开店资料
    public function  submit_apply_shop(Request $request){
        
         //读取service_users表的id，存为service_user_id
        $service_user_id = $request->session()->get('service_user_id');
        
        $shop_name = $request->input('shop_name');
        $mobile = $request->input('mobile');
        $contact = $request->input('contact');
        
         $service_user = DB::table('service_users')->where('id', $service_user_id)->first();
         $service_user = (array)$service_user;
         if (empty($service_user['shop_id'])){
             
             DB::beginTransaction();
             try{
               $shop_id = DB::table('shops')->insertGetId(
    ['shop_name' => $shop_name, 'mobile' =>  $mobile , 'contact' =>  $contact ]
                );
                $s2 = DB::table('service_users') ->where('id', $service_user_id) ->update(['shop_id' => $shop_id]);
                
                if($shop_id&&$s2 ){
                 DB::commit();
                 $result = array('status' => 1, 'msg' => "开店成功");
	         $result = json_encode($result);
                 return $result;
                }
             }catch (\Exception $e){
                   DB::rollBack();
                 $result = array('status' => 2, 'msg' => "开店失败");
	         $result = json_encode($result);
                 return $result;
             }
             
             $result = array('status' => 1, 'msg' => "开店成功");
	     $result = json_encode($result);
             return $result;
         }else{
             $result = array('status' => 1, 'msg' => "店铺已存在");
	     $result = json_encode($result);
             return $result;
         }
      
        
        
        
    }
    //店铺编辑
    public function edit(Request $request){
         //读取service_users表的id，存为service_user_id
        $service_user_id = $request->session()->get('service_user_id');
        
        
        $service_user = DB::table('service_users')->where('id', $service_user_id)->first();
        $service_user = (array)$service_user;
        
        $shop_id = $service_user['shop_id'];
        
        $shop = DB::table('shops')->where('shop_id', $shop_id)->first();
        $shop = (array)$shop;
        
        return view('/mobileadmin/shop_edit',['shop' => $shop]);
        
    }
   //店铺更新
     public function update(Request $request){
       
         $shop_id = $request->input('shop_id');
         $shop_name= $request->input('shop_name');
         $mobile = $request->input('mobile');
         $contact = $request->input('contact');
         $weixing= $request->input('weixing');
         $address = $request->input('address');
         $shop_brief = $request->input('shop_brief');
         
         DB::table('shops')->where('shop_id', $shop_id)
                 ->update(['shop_name' => $shop_name,'mobile' => $mobile,'address' => $address,'contact' => $contact
                         ,'shop_brief' => $shop_brief
                         ,'weixing' => $weixing
                         ,'contact' => $contact
                         ]);
         
             $result = array('status' => 1, 'msg' => "修改成功");
	     $result = json_encode($result);
             return $result;
         
     }
     
    //店铺logo编辑
    public function logo_edit(Request $request){
        
         //读取service_users表的id，存为service_user_id
        $service_user_id = $request->session()->get('service_user_id');
        
        
        $service_user = DB::table('service_users')->where('id', $service_user_id)->first();
        $service_user = (array)$service_user;
        
        $shop_id = $service_user['shop_id'];
        
        $shop = DB::table('shops')->where('shop_id', $shop_id)->first();
        $shop = (array)$shop;
        
        return view('/mobileadmin/shop_logo_edit',['shop' => $shop]);
    }
    
   //店铺logo更新
    public function logo_update(Request $request){
        
         $shop_id = $request->input('shop_id');
         $shop = DB::table('shops')->where('shop_id', $shop_id)->first();
         $shop = (array)$shop;
         if(empty($shop['shop_logo'])){
              //新增商家logo
              if ($request->hasFile('shop_logo')) {
                 echo $shop_logo = $request->file('shop_logo');
                 echo "</br>";
                 echo $extension = $shop_logo->extension();
                 echo "</br>";
                 $image_name = date('YmdHis', time()) . "." . $extension;
                 $store_result = $shop_logo->storeAs('/public/images/shop/', $image_name);
              }
              $Shop = new Shop;
              if ($request->hasFile('shop_logo')) {
                   $Shop->shop_logo = "/storage/images/shop/" . $image_name;
              }
              $Shop->save();
             
         }else{
             
               //更新商家logo
            if ($request->hasFile('shop_logo')) {
              
              
              $shop['shop_logo'] = str_replace('/storage/images/','/storage/app/public/images/',$shop['shop_logo']);
           
              if(isset($shop['shop_logo'])){
                  @unlink(dirname(dirname(dirname(dirname(dirname(__FILE__))))).$shop['shop_logo']);
               }
        
               echo $shop_logo = $request->file('shop_logo');
               echo "</br>";
               echo $extension = $shop_logo->extension();
               echo "</br>";
               $image_name = date('YmdHis', time()) . "." . $extension;
               $store_result = $shop_logo->storeAs('/public/images/shop/', $image_name);
             }
             if ($request->hasFile('shop_logo')) {
                 DB::table('shops')->where('shop_id', $shop_id)
                    ->update(['shop_logo' => "/storage/images/shop/" . $image_name]);
           
              } 
             
         }
         
         
        
        
    }
    
    //商家列表
   public function shop_list(Request $request)
    {   
       
          //商家列表
        $shop_list = DB::table('shops')->select('shop_id','shop_name', 'shop_logo','shop_brief')->where('shop_cat_id', 1)->get()->toArray();
        foreach ($shop_list as $key => $value) {
            $shop_list[$key] = (array) $value;
        }
        
         return view('/mobile/shop_list', ['shop_list' => $shop_list]);
         
    }
    
    //
    
    
}
