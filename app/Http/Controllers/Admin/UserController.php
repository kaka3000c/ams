<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator; 
use App\Http\Controllers\Controller;
use App\User;
use App\Feedback;
class UserController extends Controller
{
    
     public function index(Request $request)
    {
         $User = new User;
         $Array = $User::get()->toArray();
         
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
         
         return view('admin/user_list', ['user_list' => $paginator]);
         
         
    }
    
    
    //新增会员页面
     public function add(Request $request)
    {
         return view('admin/user_add');
    }
    
    //插入会员数据
     public function insert(Request $request)
    {
          
         $name = $request->input('name');
         $email = $request->input('email');
         $password = $request->input('password');
         $confirm_password = $request->input('confirm_password');
         $user_rank = $request->input('user_rank');
         $sex = $request->input('sex');
         $credit_line = $request->input('credit_line');
         $qq = $request->input('qq');
         $office_phone = $request->input('office_phone');
         $home_phone = $request->input('home_phone');
         $mobile_phone = $request->input('mobile_phone');
         
       

          $User = new User;

          $User->name = $name;
          $User->email = $email;
          $User->password = $password;
          
          $User->user_rank = $user_rank;
          $User->sex = $sex;
          $User->credit_line = $credit_line;
          $User->qq = $qq;
          $User->office_phone = $office_phone;
          $User->home_phone = $home_phone;
          $User->mobile_phone = $mobile_phone;
          
          $User->save();
    }
    
    
      public function update(Request $request)
    {
        
    }
    
       public function delete(Request $request)
    {
        
    }
    
    //用户留言列表
     public function feedback_index(Request $request)
    {
         $feedback = new Feedback;
         $feedback_list = $feedback::all();
         
        
         
         return view('admin/feedback_list', ['feedback_list' => $feedback_list]);
         
         
    }
    
}
