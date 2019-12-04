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
class InvestController extends Controller
{
    
    //在线调查
    public function index(Request $request)
    {
        
        $vote_list = DB::table('votes')->get()->toArray();
         foreach ($vote_list as $key => $value) {
              $vote_list[$key] = (array)$value;
             
         }
        foreach ($vote_list as $key => $value) {
           
            $vote_option_list = DB::table('vote_options')->where('vote_id',$vote_list[$key]['vote_id'])->get()->toArray();
          
            foreach ($vote_option_list as $key_a => $value_a) {
                $vote_option_list[$key_a] = (array)$value_a;
                
                if($vote_list[$key]['vote_id'] == $vote_option_list[$key_a]['vote_id'] ){
                   $vote_list[$key]['option'] = $vote_option_list;
                }
                 
            }
        }
        //  print_r($vote_list);
        return view('/mobile/invest',['vote_list'=> $vote_list]);
    }
    
}
