<?php

namespace App\Http\Controllers\mobile;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Shop;
use App\Banner;
use App\Education;
class EducationController extends Controller
{
    //教育发布
    
    
     //教育信息发布
   public function index(Request $request)
    {   
      
        //教育信息列表
        $product_list = DB::table('products')->where([['cat_id', '=', '38'],
  
])->select('goods_name', 'pro_id','image')->orderBy('pro_id', 'desc')->get()->toArray();
        foreach ($product_list as $key => $value) {
            $product_list[$key] = (array) $value;
        }
       
        
       
         return view('/mobile/education_list', [
             'product_list' => $product_list]);
         
    }
    
   //优惠信息插入数据库
    public function insert(Request $request){
       
        //读取service_users表的id，存为service_user_id
        $service_user_id = $request->session()->get('service_user_id');

        $title = $request->input('title');
        $content = $request->input('content');
        $contacts = $request->input('contacts');
        $mobile = $request->input('mobile');
        
        //上传图片
         $file = $request->file('photo');//获取图片
         $allowed_extensions = ["png", "jpg", "gif","jpeg","PNG", "JPG", "GIF","JPEG"];
         if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
            return response()->json([
                'status' => false,
                'message' => '只能上传 png | jpg | gif | jpeg 格式的图片'
            ]);
         }
         
        $destinationPath = '../storage/app/public/images/education';
        $extension = $file->getClientOriginalExtension();
        $fileName = date("Ymd").str_random(10).'.'.$extension;
        $file->move($destinationPath, $fileName);
        
        
        
        $Education = new Education;
        
        $Education->title = $title;
        $Education->content = $content;
        $Education->contacts = $contacts;
        $Education->mobile = $mobile;
        $Education->status = 1;
        $Education->is_show = 0;
        $Education->service_user_id = $service_user_id;
        if ($request->hasFile('photo')) {
            $Education->images = "/storage/images/education/" . $fileName;
        }
        
        $Education->save();
        
        
             $msg['text']="发布成功";
             $msg['url_link'] ="/mobile/index";
             
             return view('/mobile/msg', ['msg' => $msg]);
         
    }
    
    
    //网友发布的优惠详细页
    public function detail(Request $request,$id)
    {
        
        $education = DB::table('education')->where([['status', '=', '1'],
    ['id', '=',$id],
])->select('title','images')->first();
        
        $education =(array)$education;
       
        return view('/mobile/education_detail', ['education' => $education]);
    }
    
}
