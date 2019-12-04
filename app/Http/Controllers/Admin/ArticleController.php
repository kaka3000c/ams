<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Article;
class ArticleController extends Controller
{
    
     public function index(Request $request)
    {
         $Article = new Article;
         $Array = $Article::where('is_delete',0)->select('article_id','cat_id','title','read_volume','initial_read_volume','author','created_at')->orderBy('article_id', 'desc')->get()->toArray();
         foreach ($Array as $key => $value) {
            $Array[$key]['volume'] =  $Array[$key]['read_volume']-$Array[$key]['initial_read_volume'];
        }
        
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
          //列出所有子分类
        $categorys = DB::table('article_cats')->get()->toArray(); 
        foreach ($categorys as $key => $value) {
            $categorys[$key] = (array) $value;
        }
        function getSubs($categorys, $catId = 0, $level = 0) {

            $subs = array();
            foreach ($categorys as $item) {
                if ($item['parent_id'] == $catId) {
                    $item['level'] = $level;
                    $subs[] = $item;
                    $subs = array_merge($subs, getSubs($categorys, $item['cat_id'], $level + 1));
                }
            }
             return $subs;
        }
        $result = getSubs($categorys, 0);
        $category_list = array();
        foreach ($result as $item) {
            
           $option = array();
            $option['cat_id'] = $item['cat_id'];
             $option['cat_name'] = str_repeat('----', $item['level']) . $item['cat_name'];
             $category_list[] = $option;
        }
         
         return view('admin/article_add',['category_list' => $category_list]);
    }
    
     public function insert(Request $request)
    {
         
         if ($request->hasFile('file')) {
            echo $file = $request->file('article_img');
            echo "</br>";
            echo $extension = $file->extension();
            echo "</br>";
            $image_name = date('YmdHis', time()) . "." . $extension;
            $store_result = $file->storeAs('/public/images/article', $image_name);
        }
          
       
          $title = $request->input('title');
          
          $cat_id = $request->input('cat_id');
          $article_type = $request->input('article_type');
          $is_open = $request->input('is_open');
          $author = $request->input('author');
          $author_email = $request->input('author_email');
          $keywords = $request->input('keywords');
          $description = $request->input('description');
          $content = $request->input('content');
          $source = $request->input('source');
          
          $read_volume = mt_rand(999, 9999); 
          
           $Article = new Article;
           $Article->title = $title;
           $Article->cat_id = $cat_id;
           $Article->article_type = $article_type;
           $Article->is_open = $is_open;
           $Article->author = $author;
           $Article->author_email = $author_email;
           $Article->keywords = $keywords;
           $Article->description = $description;
           $Article->source = $source;
           $Article->read_volume = $read_volume;
           $Article->initial_read_volume = $read_volume;
           $Article->is_delete = 0;
           if ($request->hasFile('file')) {
              $Article->image = "/storage/images/article/".$image_name;
           }
           
          $Article->content = $content;
          $Article->save();
          
    }
    public function edit(Request $request,$id) {
       
        $article = DB::table('articles')->where('article_id',$id)->first(); 
        $article = (array)$article;
        
         //列出所有子分类
        $categorys = DB::table('article_cats')->get()->toArray(); 
        foreach ($categorys as $key => $value) {
            $categorys[$key] = (array) $value;
        }
        function getSubs($categorys, $catId = 0, $level = 0) {

            $subs = array();
            foreach ($categorys as $item) {
                if ($item['parent_id'] == $catId) {
                    $item['level'] = $level;
                    $subs[] = $item;
                    $subs = array_merge($subs, getSubs($categorys, $item['cat_id'], $level + 1));
                }
            }
             return $subs;
        }
        $result = getSubs($categorys, 0);
        $category_list = array();
        foreach ($result as $item) {
            
           $option = array();
            $option['cat_id'] = $item['cat_id'];
             $option['cat_name'] = str_repeat('----', $item['level']) . $item['cat_name'];
             $category_list[] = $option;
        }
        
        
        
        return view('admin/article_edit', ['article' =>$article,'category_list' => $category_list]);
    }
    
      public function update(Request $request)
    {
        $article_id = $request->input('article_id');
        $title = $request->input('title');
        $cat_id = $request->input('cat_id');
        $content = $request->input('content');
        $source = $request->input('source');
         if ($request->hasFile('article_img')) {
              
            $article = DB::table('articles')->where('article_id', $article_id)->first();
            $article = (array)$article;
            $article['image'] = str_replace('/storage/images/','/storage/app/public/images/',$article['image']);
           
            if(isset($article['image'])){
                 @unlink(dirname(dirname(dirname(dirname(dirname(__FILE__))))).$article['image']);
            }
        
            echo $goods_img = $request->file('article_img');
            echo "</br>";
            echo $extension = $goods_img->extension();
            echo "</br>";
            $image_name = date('YmdHis', time()) . "." . $extension;
            $store_result = $goods_img->storeAs('/public/images/article/', $image_name);
        }
        DB::table('articles')->where('article_id', $article_id)->update(['title' => $title
                ,'content' => $content  ,'source' => $source  ,'cat_id' => $cat_id  
            ]);
        
        if ($request->hasFile('article_img')) {
             DB::table('articles')->where('article_id', $article_id)
                 ->update(['image' => "/storage/images/article/" . $image_name]);
           
        }
       
        echo "修改成功";
        
        
    }
    
    //取消回收站
    public function cancel_del(Request $request,$id) {
        
        DB::table('articles')->where('article_id', $id)->update(['is_delete' => 0]);
        
    }
    
   //放入回收站
    public function delete(Request $request,$id) {
        
        DB::table('articles')->where('article_id', $id)->update(['is_delete' => -1]);
    }
    
    //确定删除
    public function real_del(Request $request,$id) {
       
            
            $article = DB::table('articles')->where('article_id', $id)->first();
            $article = (array)$article;
            
            $article = DB::table('articles')->where('article_id', $id)->delete();
           
    }
     //回收站文章列表
    public function trash(Request $request) {
        
          
      
        $Array = Article::where('is_delete',-1)->orderBy('article_id', 'desc')->get()->toArray();
        //print_r($product_list->toArray());

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
        
        
        return view('admin/article_trash', ['article_list' => $paginator]);
    }
}
