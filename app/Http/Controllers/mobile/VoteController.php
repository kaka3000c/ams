<?php

namespace App\Http\Controllers\mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Shop;
use App\Banner;
use App\Vote;
use App\VoteOption;
class VoteController extends Controller
{
    
    //投票列表
    public function index(Request $request)
    {
        //读取vote_id=2的所有选项
        $vote_option_list = DB::table('vote_options')->where('vote_id',2)->get()->toArray();
         
         foreach ($vote_option_list as $key => $value) {
              $vote_option_list[$key] = (array)$value;
             
         }
         //  print_r($vote_option_list);
        
         
      
       
        return view('/mobile/vote',['vote_option_list'=> $vote_option_list]);
    }
    
    //投票详细页
    public function vote_option_detail(Request $request,$id)
    {
        
        $vote_option_detail = DB::table('vote_options')->where('option_id',$id)->first();
        $vote_option_detail = (array)$vote_option_detail;
       
        return view('/mobile/vote_option_detail',['vote_option_detail'=> $vote_option_detail]);
    }
    
    //投票
    public function vote_option_insert(Request $request)
    {
        
         $vote_id = $request->input('vote_id');
         $option_id= $request->input('option_id');
         
         //session读取service_user_id
         //判断公众号是否登录
         $service_user_id = $request->session()->get('service_user_id');
//         if(empty($service_user_id)){
//              $result = array('status' => 0, 'msg' => "请先登录");
//	      $result = json_encode($result);
//              return $result;
//         }
          
         //开启事务
         //选项增加1
         
            DB::beginTransaction();
             $s =  DB::table('vote_options')->where('option_id',$option_id)->increment('option_count');
             $time = date("Y-m-d  H:i:s", time());
             $s = $s && DB::table('vote_logs')->insert([   
                  ['option_id' => $option_id, 'vote_id' => $vote_id,'created_at'=>$time
                     ]
               ]);
             
             if($s){
                 DB::commit();
                 $result = array('status' => 1, 'msg' => "投票成功");
	         $result = json_encode($result);
                 return $result;
             }else{
                 DB::rollBack();
                 
             }
         
         
         
        $result = array('status' => 1, 'msg' => "投票成功");
	$result = json_encode($result);

        return $result;
    }
    
    
    
}
