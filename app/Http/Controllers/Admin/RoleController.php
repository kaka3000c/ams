<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Role;
use App\Libs\ActionList;
use App\resources\lang\zh_cn\auth;
class RoleController extends Controller {

    public function index(Request $request) {
        $Role = new Role;
        $role = $Role::paginate(6)->toArray();
         
        
        
       // print_r($role);
            
        return view('admin/role_list', ['role_list' => $role]);
    }

    public function add(Request $request) {
        
        $admin_action_list = DB::table('admin_actions')->where('parent_id', 0)->get()->toArray();
        $priv_arr = array();
        foreach ($admin_action_list as $key => $value) {

            $priv_arr[$value->action_id] = (array) $value;
        }
        
         
        $priv_arr_keys = array_keys($priv_arr);
        $priv_list = DB::table('admin_actions')->whereIn('parent_id', $priv_arr_keys)->get()->toArray();
        $priv_list_arr = array();
        foreach ($priv_list as $key => $value) {

            $priv_arr[$value->parent_id]["priv"][$value->action_code] = (array) $value;
        }
        
        
        $priv_str = '';
        // 将同一组的权限使用 "," 连接起来，供JS全选
        foreach ($priv_arr AS $action_id => $action_group) {
            $priv_arr[$action_id]['priv_list'] = join(',', @array_keys($action_group['priv']));

            foreach ($action_group['priv'] AS $key => $val) {
                $priv_arr[$action_id]['priv'][$key]['cando'] = (strpos($priv_str, $val['action_code']) !== false || $priv_str == 'all') ? 1 : 0;
            }
        }

        return view('admin/role_add', ['priv_arr' => $priv_arr]);
    }

    public function insert(Request $request) {

     
        $role_name = $request->input('role_name');
        $role_describe = $request->input('role_describe');
        
        
         $action_code = $request->input('action_code');
              
        $action_list = @join(",", $action_code);
        
        
            
          $Role = new Role;
          $Role->role_name = $role_name;
          $Role->role_describe = $role_describe;
          $Role->action_list = $action_list;
          $Role->save();
         
    }

    public function update(Request $request) {
        
    }

    public function delete(Request $request,$id) {
        
        $admin_users  = DB::table('admin_users')->where('role_id', $id)->get()->toArray();
        
       
        if ( count($admin_users)>0 ){
            echo "该角色还存在管理员，无法删除";
        }else{
            DB::table('roles')->where('role_id', $id)->delete();
        }
        
        
    }

}
