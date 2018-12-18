<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;

class PostController extends Controller
{
    //列表
    public function  index(){
        
         $posts =  Post::orderBy('created_at','desc')->get();
      
       print_r($posts->toArray());
        
        die();
           
         
         return view("post/index",compact('posts'));
    }
    
    
    //详情页
    public function  show(){
         return view("post/show");
    }
    
    
    //创建文章
    public function  create(){
         return view("post/create");
    }
    
    //创建逻辑
    public function  store(){
        
    }
    
    //编辑页面
    public function  edit(){
         return view("post/edit");
    }
    
    
    //删除逻辑
    public function  delete(){
        
    }
}
