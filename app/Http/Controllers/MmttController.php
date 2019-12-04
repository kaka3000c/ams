<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Shop;
use App\Banner;
class MmttController extends Controller
{
    //茂名头条
    
    
   public function index(Request $request)
    {   
        //文章列表
        $article_list = DB::table('articles')->where([['is_delete', '=', '0'],
    ['cat_id', '=', '6'],
])->select('title', 'article_id','image')->orderBy('article_id', 'desc')->get()->toArray();
        foreach ($article_list as $key => $value) {
            $article_list[$key] = (array) $value;
        }
       
         return view('/mmtt_list', [
             'article_list' => $article_list]);
         
    }
    
   
    
}
