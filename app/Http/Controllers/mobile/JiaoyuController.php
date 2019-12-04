<?php

namespace App\Http\Controllers\mobile;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Shop;
use App\Banner;
class JiaoyuController extends Controller
{
    //教育频道
    
    
   public function index(Request $request)
    {   
        //文章列表
        $article_list = DB::table('articles')->where([['is_delete', '=', '0'],
    ['cat_id', '=', '9'],
])->select('title', 'article_id','image')->get()->toArray();
        foreach ($article_list as $key => $value) {
            $article_list[$key] = (array) $value;
        }
       
        //用户发布的教育信息
        $education_list = DB::table('education')->where([['status', '=', '1'],['is_show', '=', '1'],
])->select('id','title','images','service_user_id')->orderBy('id', 'desc')->get()->toArray();
        foreach ($education_list as $key => $value) {
            $education_list[$key] = (array) $value;
            //根据service_user_id获取发布优惠信息的用户信息
            $service_user = DB::table('service_users')->where('id', $education_list[$key]['service_user_id'])->first();
            $service_user = (array)$service_user;
            
            $education_list[$key]['headimgurl'] = $service_user['headimgurl'];
        }
        
         return view('/mobile/education_list', [
             'article_list' => $article_list,'education_list' => $education_list]);
         
    }
    
   
    
}
