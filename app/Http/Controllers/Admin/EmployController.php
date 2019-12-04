<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Employ;
class EmployController extends Controller
{
    
     public function index(Request $request)
    {
         $Employ = new Employ;
         $Array = $Employ::orderBy('id', 'desc')->get()->toArray();
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
                  
         return view('admin/employ_list', ['article_list' => $paginator]);
         
         
    }
     public function add(Request $request)
    {
       
         
         return view('admin/employ_add');
    }
    
     public function insert(Request $request)
    {
         
          $title = $request->input('title');
          $content = $request->input('content');
          $is_show = $request->input('is_show');
          $source = $request->input('source');
          
         $read_volume = mt_rand(999, 9999); 
          
           $Employ = new Employ;
           $Employ->title = $title;
           $Employ->content = $content;
           $Employ->is_show = $is_show;
           $Employ->source = $source;
          $Employ->read_volume = $read_volume;
           $Employ->initial_read_volume = $read_volume;
           $Employ->save();
          
    }
    public function edit(Request $request,$id) {
       
        $employ = DB::table('employs')->where('id',$id)->first(); 
        $employ = (array)$employ;
        return view('admin/employ_edit', ['employ' =>$employ]);
        
    }
    
      public function update(Request $request)
    {
         
          $id = $request->input('employ_id');
          $title = $request->input('title');
          $content = $request->input('content');
          $is_show = $request->input('is_show');
          $source = $request->input('source');
         
        DB::table('employs')->where('id', $id)->update(['title' => $title
                ,'content' => $content  ,'is_show' => $is_show  ,'source' => $source  
            ]);
        
    
       
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
       
            
            
            
            $article = DB::table('employs')->where('id', $id)->delete();
           
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
