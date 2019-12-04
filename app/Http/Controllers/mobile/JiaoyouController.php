<?php

namespace App\Http\Controllers\mobile;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Shop;
use App\Banner;
use App\Marriage;
class JiaoyouController extends Controller
{
    //征婚交友频道
    
    
   public function index(Request $request)
    {   
        //文章列表
        $articel_list = DB::table('articles')->where([['is_delete', '=', '0'],
    ['cat_id', '=', '11'],
])->select('title', 'article_id','image')->get()->toArray();
        foreach ($articel_list as $key => $value) {
            $articel_list[$key] = (array) $value;
        }
      
        //婚恋列表
        
        //读取service_users表的id，存为service_user_id
         $service_user_id = $request->session()->get('service_user_id');
        
       
         $marriage_user_list = DB::table('marriages')->where('status', 1)->get()->toArray();
         foreach ($marriage_user_list as $key => $value) {
            $marriage_user_list[$key] = (array) $value;
            $marriage_user_list[$key]['birthday'] = date("Y")-substr( $marriage_user_list[$key]['birthday'],0,4);
        }
        
        //Banner列表
        $Banner = new Banner;
        $banner_list = $Banner::where([['position_id', '=', '3'],['enabled', '=', '1'],
])->orderBy('banner_id', 'desc')->get();
         
        return view('/mobile/marriage',['marriage_user_list' => $marriage_user_list,'banner_list' => $banner_list]);
         
    }
    
    //登记表单
    public function join (Request $request){
        
         //读取service_users表的id，存为service_user_id
         $service_user_id = $request->session()->get('service_user_id');
         
         $marriage = DB::table('marriages')->where('service_user_id', $service_user_id)->first();
         $marriage = (array)$marriage;
         
         if(empty($marriage)){
             //显示加入征婚表单
             return view('/mobile/marriage_join');
             
         }else{
             
             return redirect("/mobile/jiaoyou/edit");
            
         }
    }
    
    //征婚资料提交
    public function insert (Request $request){
        
        //读取service_users表的id，存为service_user_id
         $service_user_id = $request->session()->get('service_user_id');
         
         $marriage = DB::table('marriages')->where('service_user_id', $service_user_id)->first();
         $marriage = (array)$marriage;
          if(!empty($marriage)){
             
             //你已提交征婚资料，无需再提交
             $msg['text']="你已提交征婚资料，无需再提交";
             $msg['url_link'] ="/mobile/jiaoyou/";
            return view('/mobile/msg', ['msg' => $msg]);
             
         }
         
         
        //上传头像
         $file = $request->file('photo');//获取图片
         if(empty($file)){
            
             $msg['text']="头像不能为空";
             $msg['url_link'] ="/mobile/jiaoyou/join";
             
             return view('/mobile/msg', ['msg' => $msg]);
         }
         $allowed_extensions = ["png", "jpg", "gif","jpeg","PNG", "JPG", "GIF","JPEG"];
         
        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
            return response()->json([
                'status' => false,
                'message' => '只能上传 png | jpg | gif | jpeg 格式的图片'
            ]);
        }
        
        $destinationPath = '../storage/app/public/images/touxiang';
        $extension = $file->getClientOriginalExtension();
        $fileName = str_random(10).'.'.$extension;
        
        $file->move($destinationPath, $fileName);
        
        $nickName = $request->input('nickName');
        $sex = $request->input('sex');
        $birthday = $request->input('birthday');
        $height = $request->input('height');
        $weight = $request->input('weight');
        $education = $request->input('education');
        $marry = $request->input('marry');
        $salary = $request->input('salary');
        $housing_situation = $request->input('housing_situation');
        $car_situation = $request->input('car_situation');
        
       
        $Marriage = new Marriage;
        $Marriage->service_user_id = $service_user_id;
        $Marriage->nickName = $nickName;
        $Marriage->sex = $sex;
        $Marriage->birthday = $birthday;
        $Marriage->height = $height;
        $Marriage->weight = $weight;
        $Marriage->education = $education;
        $Marriage->marry = $marry;
        $Marriage->salary = $salary;
        $Marriage->housing_situation = $housing_situation;
        $Marriage->car_situation = $car_situation;
        $Marriage->status = 0;
        
        if ($request->hasFile('photo')) {
            $Marriage->touxiang = "/storage/images/touxiang/" . $fileName;
        }
         $s = $Marriage->save();
       
    
        
        if($s){
              $msg['text']="提交成功，等待审批！";
              $msg['url_link'] ="/mobile/jiaoyou/";
              return view('/mobile/msg', ['msg' => $msg]);
        }else{
              $msg['text']="提交失败，请重新提交！";
              $msg['url_link'] ="/mobile/jiaoyou/join";
              return view('/mobile/msg', ['msg' => $msg]);
        }
       
    }
    
    //编辑
    public function edit(Request $request){
        
        
         //读取service_users表的id，存为service_user_id
         $service_user_id = $request->session()->get('service_user_id');
         
         $marriage = DB::table('marriages')->where('service_user_id', $service_user_id)->first();
         
         $marriage = (array)$marriage;
         
        
            return view('/mobile/marriage_edit',['marriage' => $marriage]);
         
    }
    
    
    
    //更新
    public function update(Request $request){
        
         //读取service_users表的id，存为service_user_id
         $service_user_id = $request->session()->get('service_user_id');
         
         
         
         $marriage = DB::table('marriages')->where('service_user_id', $service_user_id)->first();
         $marriage = (array)$marriage;
         
          if ($request->hasFile('photo')) {
              
              $marriage['touxiang'] = str_replace('/storage/images/','/storage/app/public/images/',$marriage['touxiang']);
           
              if(isset($marriage['touxiang'])){
                  @unlink(dirname(dirname(dirname(dirname(dirname(__FILE__))))).$marriage['touxiang']);
               }
               
                $file = $request->file('photo');//获取图片
         
               $allowed_extensions = ["png", "jpg", "gif","jpeg","PNG", "JPG", "GIF","JPEG"];
         
               if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
                     return response()->json([
                          'status' => false,
                           'message' => '只能上传 png | jpg | gif | jpeg 格式的图片'
                      ]);
                }
        
                $destinationPath = '../storage/app/public/images/touxiang';
                $extension = $file->getClientOriginalExtension();
                $fileName = str_random(10).'.'.$extension;
                $file->move($destinationPath, $fileName);
               
               
          }
         
         
        $nickName = $request->input('nickName');
        $sex = $request->input('sex');
        $birthday = $request->input('birthday');
        $height = $request->input('height');
        $weight = $request->input('weight');
        $education = $request->input('education');
        $marry = $request->input('marry');
        $salary = $request->input('salary');
        $housing_situation = $request->input('housing_situation');
        $car_situation = $request->input('car_situation');
        
        DB::table('marriages')->where('service_user_id', $service_user_id)->update(['nickName' => $nickName
                ,'sex' => $sex ,'birthday' => $birthday ,'height' => $height 
                ,'weight' => $weight,'education' => $education,'marry' => $marry
                ,'salary' => $salary,'housing_situation' => $housing_situation,'car_situation' => $car_situation
            ]);
        
        
        if ($request->hasFile('photo')) {
                 DB::table('marriages')->where('service_user_id', $service_user_id)
                    ->update(['touxiang' => "/storage/images/touxiang/" . $fileName]);
           
              } 
    }
    
    
}
