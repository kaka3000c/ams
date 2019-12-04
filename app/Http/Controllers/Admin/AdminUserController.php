<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\AdminUser;
use App\Role;
class AdminUserController extends Controller
{
    
     public function index(Request $request)
    {
         $AdminUser = new AdminUser;
         $Array = $AdminUser::get()->toArray();
         
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

         
         return view('admin/adminuser_list', ['adminuser_list' => $paginator]);
         
         
    }
     public function add(Request $request)
    {
         
         //读取优惠劵
        $roles_list = DB::table('roles')->get()->toArray();
        
         
         foreach ($roles_list as $key => $value) {
              $roles_list[$key] = (array)$value;
         }
        
         return view('admin/adminuser_add', ['roles_list' => $roles_list]);
    }
    
     public function insert(Request $request)
    {
         
         
         $select_role = $request->input('select_role');
          
         $user_name = $request->input('user_name');
         $email = $request->input('email');
         $password = $request->input('password');
         $pwd_confirm = $request->input('pwd_confirm');
          
         $roles = DB::table('roles')->where('role_id', $select_role)->first();
         $roles = (array)$roles;
         $action_list = $roles['action_list'];
         
          $AdminUser = new AdminUser;
          $AdminUser->user_name = $user_name;
          $AdminUser->email = $email;
          $AdminUser->password = $password;
          $AdminUser->action_list = $action_list;
          $AdminUser->save();
         
       
    }
    
    
      public function update(Request $request)
    {
        
    }
    
       public function delete(Request $request)
    {
        
    }
    
}
