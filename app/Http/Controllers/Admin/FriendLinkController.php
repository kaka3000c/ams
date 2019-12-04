<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator; 
use App\Http\Controllers\Controller;
use App\AdminLog;
use App\FriendLink;
class FriendLinkController extends Controller
{
    
     public function index(Request $request)
    {
         $FriendLink = new FriendLink;
         $Array = $FriendLink::get()->toArray();
         
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
         
         return view('admin/friendlink_list', ['friendlink_list' => $paginator]);
         
         
    }
     public function add(Request $request)
    {
         return view('admin/friendlink_add');
    }
    
     public function insert(Request $request)
    {
          
       $link_name = $request->input('link_name');
       $link_url = $request->input('link_url');
       $show_order = $request->input('show_order');
         
          $FriendLink = new FriendLink;

          $FriendLink->link_name = $link_name;
          $FriendLink->link_url = $link_url;
          $FriendLink->show_order = $show_order;
          $FriendLink->save();
          
          
          $result = array('status' => "1"
               );
          return json_encode($result);
         
    }
    
    
      public function update(Request $request)
    {
        
    }
    
       public function delete(Request $request)
    {
        
    }
    
}
