<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator; 
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Category;
class CategoryController extends Controller
{
    
     public function index(Request $request)
    {
         $Category = new Category;
         $Array = $Category::get()->toArray();
         
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
         
         return view('admin/category_list', ['category_list' => $paginator]);
         
    }
     public function add(Request $request)
    {
         
          //列出所有子分类
        $categorys = DB::table('categories')->get()->toArray(); 
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
        
         return view('admin/category_add', ['category_list' => $category_list]);
    }
    
     public function insert(Request $request)
    {
          
          
          $cat_name = $request->input('cat_name');
          $parent_id = $request->input('parent_id');
          
          $Category = new Category;

          $Category->cat_name = $cat_name;
          $Category->parent_id = $parent_id;
          $Category->save();
    }
    
    public function edit(Request $request,$id) {
        
        $category = DB::table('categories')->where('cat_id',$id)->first(); 
        $category = (array)$category;
        
        
        
          //列出所有子分类
        $categorys = DB::table('categories')->get()->toArray(); 
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
        
         return view('admin/category_edit', ['category_list' => $category_list , 'category'=>$category]);
    }
    
    
      public function update(Request $request)
    {
        $cat_id = $request->input('id');
        $cat_name = $request->input('cat_name');
        $parent_id = $request->input('parent_id');
        $measure_unit = $request->input('measure_unit');
        $sort_order = $request->input('sort_order');
        $is_show = $request->input('is_show');
        $show_in_nav = $request->input('show_in_nav');
        $grade= $request->input('grade');
        $style= $request->input('style');
        $keywords= $request->input('keywords');
        $cat_desc= $request->input('cat_desc');
        
        
        DB::table('categories')->where('cat_id', $cat_id)->update(
                ['cat_name' => $cat_name,'parent_id' => $parent_id,
                    'measure_unit' => $measure_unit,
                    'sort_order' => $sort_order,
                    'is_show' => $is_show,
                    'show_in_nav' => $show_in_nav,
                    'grade' => $grade,
                    'keywords' => $keywords,
                    'cat_desc' => $cat_desc
                 ] );
          
          
    }
    
       public function delete(Request $request,$id)
    {
         $category = DB::table('categories')->where('parent_id', $id)->get()->toArray();
         
         if(empty($category)){
              DB::table('categories')->where('cat_id', $id)->delete();
             echo "移除成功";
         }else{
             echo "存在子类，不能删除";
         }
    }
    
}
