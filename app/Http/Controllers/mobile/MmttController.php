<?php

namespace App\Http\Controllers\mobile;


use App\Http\Controllers\Controller;
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
        $articel_list = DB::table('articles')->where([['is_delete', '=', '0'],
    ['cat_id', '=', '6'],
])->select('title', 'article_id','image')->orderBy('article_id', 'desc')->get()->toArray();
        foreach ($articel_list as $key => $value) {
            $articel_list[$key] = (array) $value;
        }
       
         return view('/mobile/article_list', [
             'articel_list' => $articel_list]);
         
    }
    
   
    
}
