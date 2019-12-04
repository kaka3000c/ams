<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator; 
use App\Http\Controllers\Controller;
use App\ArticleCat;
class ArticleCatController extends Controller
{
    
     public function index(Request $request)
    {
         echo 33;
         $ArticleCat = new ArticleCat;
         $Array = $ArticleCat::get()->toArray();
         
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
         
         return view('admin/articlecat_list', ['articlecat_list' => $paginator]);
         
         
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
             $option['cat_name'] = str_repeat('--', $item['level']) . $item['cat_name'];
             $category_list[] = $option;
        }
        
         return view('admin/articlecat_add', ['category_list' => $category_list]);
    }
    
     public function insert(Request $request)
    {
        
          
          $cat_name = $request->input('cat_name');
          $parent_id = $request->input('parent_id');
          $sort_order = $request->input('sort_order');
          $keywords = $request->input('keywords');
          $cat_desc = $request->input('cat_desc');
          
          $ArticleCat = new ArticleCat;

          $ArticleCat->cat_name = $cat_name;
          $ArticleCat->parent_id = $parent_id;
          $ArticleCat->sort_order = $sort_order;
          $ArticleCat->keywords = $keywords;
          $ArticleCat->cat_desc = $cat_desc;
              
          $ArticleCat->save();
    }
    
     public function edit(Request $request,$id) {
         
          $article_cat = DB::table('article_cats')->where('cat_id',$id)->first(); 
        $article_cat = (array)$article_cat;
         
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
             $option['cat_name'] = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $item['level']) . $item['cat_name'];
             $category_list[] = $option;
        }
         
          return view('admin/articlecat_edit', ['category_list' => $category_list , 'article_cat'=>$article_cat]);
     }
    
      public function update(Request $request)
    {
          $cat_id = $request->input('cat_id');
          
          $cat_name = $request->input('cat_name');
          $parent_id = $request->input('parent_id');
          $sort_order = $request->input('sort_order');
          $keywords = $request->input('keywords');
          $cat_desc = $request->input('cat_desc');
          $show_in_nav = $request->input('show_in_nav');
          
           DB::table('article_cats')->where('cat_id', $cat_id)->update(
                ['cat_name' => $cat_name,'parent_id' => $parent_id,
                    
                    'sort_order' => $sort_order,
                    
                    'show_in_nav' => $show_in_nav,
                   
                    'keywords' => $keywords,
                    'cat_desc' => $cat_desc
                 ] );
          
    }
    
        public function delete(Request $request,$id)
    {
         $carticle_cat = DB::table('article_cats')->where('parent_id', $id)->get()->toArray();
         
         if(empty($carticle_cat)){
              DB::table('article_cats')->where('cat_id', $id)->delete();
             echo "移除成功";
         }else{
             echo "存在子类，不能删除";
         }
    }
    
}
