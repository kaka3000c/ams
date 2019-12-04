<?php

namespace App\Http\Controllers\mobile;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Shop;
use App\Banner;
use App\Car;
class CarController extends Controller
{
    //汽车发布
    
    
  
   public function index(Request $request)
    {   
       
       
         return view('/mobile/car');
         
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
         
        $destinationPath = '../storage/app/public/images/car';
        $extension = $file->getClientOriginalExtension();
        $fileName = date("Ymd").str_random(10).'.'.$extension;
        $file->move($destinationPath, $fileName);
        
        
        
        $Car = new Car;
        
        $Car->title = $title;
        $Car->content = $content;
        $Car->contacts = $contacts;
        $Car->mobile = $mobile;
        $Car->status = 1;
        $Car->is_show = 0;
        $Car->service_user_id = $service_user_id;
        if ($request->hasFile('photo')) {
            $Car->images = "/storage/images/car/" . $fileName;
        }
        
        $Car->save();
        
        
             $msg['text']="发布成功";
             $msg['url_link'] ="/mobile/index";
             
             return view('/mobile/msg', ['msg' => $msg]);
         
    }
    
    
    //网友发布的优惠详细页
    public function detail(Request $request,$id)
    {
        
        $car = DB::table('cars')->where([['status', '=', '1'],
    ['id', '=',$id],
])->select('title','images')->first();
        
        $car =(array)$car;
       
        return view('/mobile/car_detail', ['car' => $car]);
    }
         
     
    
}
