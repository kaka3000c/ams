<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\Controller;
use App\Article;
class ArticleController extends Controller
{
    
     public function index(Request $request)
    {
         $Article = new Article;
         $Array = $Article::get()->toArray();
         
         //分页
      $perPage = 10;            //每页显示数量
      if ($request->has('page')) {
            $current_page = $request->input('page');
            $current_page = $current_page <= 0 ? 1 :$current_page;
       } else {
            $current_page = 1;
      }
      $item = array_slice($Array, ($current_page-1)*$perPage, $perPage);//$Array为要分页的数组
      $totals = count($Array);
      $paginator =new LengthAwarePaginator($item, $totals, $perPage, $current_page, [
             'path' => Paginator::resolveCurrentPath(),
             'pageName' => 'page',
      ]);
                  
         return view('admin/article_list', ['article_list' => $paginator]);
         
         
    }
     public function add(Request $request)
    {
         return view('admin/article_add');
    }
    
     public function insert(Request $request)
    {
         
         if ($request->hasFile('file')) {
            echo $file = $request->file('goods_img');
            echo "</br>";
            echo $extension = $file->extension();
            echo "</br>";
            $image_name = date('YmdHis', time()) . "." . $extension;
            $store_result = $file->storeAs('/public/images/product', $image_name);
        }
          
       
          $title = $request->input('title');
          $article_cat = $request->input('article_cat');
          $article_type = $request->input('article_type');
          $is_open = $request->input('is_open');
          $author = $request->input('author');
          $author_email = $request->input('author_email');
          $keywords = $request->input('keywords');
          $description = $request->input('description');
          $content = $request->input('content');
          
           $Article = new Article;
           $Article->title = $title;
           $Article->cat_id = $article_cat;
           $Article->article_type = $article_type;
           $Article->is_open = $is_open;
           $Article->author = $author;
           $Article->author_email = $author_email;
           $Article->keywords = $keywords;
           $Article->description = $description;
           if ($request->hasFile('file')) {
              $Article->image = "/storage/images/article/".$image_name;
           }
           
          $Article->content = $content;
          $Article->save();
          
    }
    
    
      public function update(Request $request)
    {
        
    }
    
       public function delete(Request $request)
    {
        
    }
    
}
