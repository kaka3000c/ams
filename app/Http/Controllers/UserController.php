<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Order;
use \App\User_address;
class UserController extends Controller
{
    
    //用户欢迎页
    public function index(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $name = $request->session()->get('name');
        
         $user =  User::find($user_id);
        
        return view('user.index',['name' => $name],['user' => $user]);
        
    }
    
    //用户信息页 
    public function profile(Request $request){
        
        $user_id = $request->session()->get('user_id');
        $name = $request->session()->get('name');
        
        $user =  User::find($user_id);
        
        return view('user.profile',['name' => $name],['user' => $user]);
    }
    
    //订单列表
    public function order_list(Request $request){
        
        $user_id = $request->session()->get('user_id');
        $name = $request->session()->get('name');
        
        
        $Order = new Order;
        $order_list = $Order::all();
        
        return view('user.order_list',['order_list' => $order_list]);
    }
    
    //收货地址列表
    public function address_list(Request $request){
        
        $user_id = $request->session()->get('user_id');
        $name = $request->session()->get('name');
        
        $user_address_list =  User_address::where('user_id',$user_id)->get();
       // $User_address= new User_address;
        //$user_address_list = $User_address::all();
        
        return view('user.address_list',['name' => $name],['user_address_list' => $user_address_list]);
    }
    
    //我的收藏
    public function collection_list(){
        
        $name = $request->session()->get('name');
        
        return view('user.collection_list',['name' => $name]);
    }
    //我的留言
    public function message_list(){
        
        $name = $request->session()->get('name');
        return view('user.message_list',['name' => $name]);
        
    }
    
    //我的标签
    public function tag_list(){
        
        $name = $request->session()->get('name');
        return view('user.tag_list',['name' => $name]);
        
    }
    
     //缺货登记
    public function booking_list(){
        
        $name = $request->session()->get('name');
        return view('user.booking_list',['name' => $name]);
        
    }
    
     //红包
    public function bonus(){
        
        $name = $request->session()->get('name');
        return view('user.bonus',['name' => $name]);
        
    }
    
     
    
    
    
    //我的推荐
    public function affiliate()
    {
        
        return view('user.affiliate');
    }
    
    //我的评论
    public function comment_list()
    {
        
        return view('user.comment_list');
    }
    
    //包裹跟踪
    public function track_packages()
    {
        
        return view('user.track_packages');
    }
            
    //资金管理
    public function account_log()
    {
        
        return view('user.account_log');
    }
    
    
             //个人设置页面
    public function settingStore()
   {
        
        
    }
    
    public function store(Request $request)
    {
        
        $name = $request->input('name');
        echo $name;
        //
    }
}
