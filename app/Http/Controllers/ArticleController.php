<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Article;
use App\Shop;
class ArticleController extends Controller
{
     public function detail(Request $request,$id)
    {
         echo $value = $request->session()->get('key');
         
         DB::table('articles')->increment('read_volume');
         $Article = new Article;
         
         $article_detail = $Article::where('article_id', $id)->get();
         
         foreach ($article_detail as $article) {
            $content =  $article->content;
            $title = $article->title;
            
         }
         
        
         return view('article_detail', ['article_detail' => $article_detail,'content' => $content,'title' => $title
                 ]);
    }
    
     //优惠频道
    public function promo(Request $request){
       
        //优惠文章列表
        $article_list = DB::table('articles')->where([['is_delete', '=', '0'],
    ['cat_id', '=', '5'],
])->select('title', 'article_id','image')->orderBy('article_id', 'desc')->take(20)->get()->toArray();
        foreach ($article_list as $key => $value) {
            $article_list[$key] = (array) $value;
        }
      
        //用户发布的优惠信息
        $promo_list = DB::table('promo_infos')->where([['status', '=', '1'],['is_show', '=', '1'],
])->select('id','title','images','service_user_id')->orderBy('id', 'desc')->get()->toArray();
        foreach ($promo_list as $key => $value) {
            $promo_list[$key] = (array) $value;
            //根据service_user_id获取发布优惠信息的用户信息
            $service_user = DB::table('service_users')->where('id', $promo_list[$key]['service_user_id'])->first();
            $service_user = (array)$service_user;
            
            $promo_list[$key]['headimgurl'] = $service_user['headimgurl'];
        }
        
        
        
        
         return view('/promo_list', [
             'article_list' => $article_list,'promo_list' => $promo_list]);
         
    }
}
