<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator; 
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Vote;
use App\VoteOption;

class VoteController extends Controller
{
     public function index(Request $request)
    {
      
      $Vote = new Vote;
         $Array = $Vote::get()->toArray();
       
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

       
      return view('admin/vote_list', ['vote_list' => $paginator]);
         
         
    }
    
    //增加投票
     public function add(Request $request)
    {
         
         return view('admin/vote_add');
     }
    
    //增加投票
     public function insert(Request $request) {
         
        $vote_name= $request->input('vote_name');
        $can_multi= $request->input('can_multi');
          
        $Vote = new Vote;

        $Vote->vote_name = $vote_name;
        $Vote->can_multi = $can_multi;
        $Vote->save();
        echo "增加成功";
        
     }
     //删除投票 
      public function delete(Request $request,$id) {
          $vote_option_list = DB::table('vote_options')->where('vote_id', $id)->get()->toArray();
          
          foreach ($vote_option_list as $key => $value) {
               $vote_option_list[$key] = (array)$value;
           }
          if(!empty($vote_option_list)){
                DB::table('vote_options')->where('vote_id', $id)->delete();
          }
          DB::table('votes')->where('vote_id', $id)->delete();
          echo "删除成功";
      }
     
      //增加投票选项页面
     public function option_add(Request $request,$id) {
         
          $vote_option_list = DB::table('vote_options')->where('vote_id', $id)->get()->toArray();
          
          foreach ($vote_option_list as $key => $value) {
               $vote_option_list[$key] = (array)$value;
           }
          
         return view('admin/option_add', ['vote_id' => $id , 'vote_option_list' => $vote_option_list]);
     }
     
      //插入投票选项
     public function option_insert(Request $request) {
         
         //作品图片上传
          if ($request->hasFile('images')) {
              echo $images = $request->file('images');
              echo "</br>";
              echo $extension = $images->extension();
              echo "</br>";
              $image_name = date('YmdHis', time()) . "." . $extension;
              $store_result = $images->storeAs('/public/images/vote_works', $image_name);
          }
         
         
         $vote_id= $request->input('vote_id');
         $option_name= $request->input('option_name');
         
         $VoteOption = new VoteOption;
         if ($request->hasFile('images')) {
            $VoteOption->images = "/storage/images/vote_works/" . $image_name;
        }
         $VoteOption->vote_id = $vote_id;
         $VoteOption->option_name = $option_name;
         $VoteOption->save();
         echo "增加投票选项成功";
     }
     
      //删除投票选项
      public function option_delete(Request $request,$id) {
          
          DB::table('vote_options')->where('option_id', $id)->delete();
          echo "移除成功";
      }
     
}