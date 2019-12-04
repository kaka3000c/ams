<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Product;
use App\Shop;
use App\Banner;
use App\HotelScoreOrder;
use Illuminate\Support\Facades\DB;

//饭店-饭店订单中心//饭店-饭店订单中心

class HotelScoreOrderController extends Controller
{
    public function index(Request $request)
    {
       
      $Array = DB::table('hotel_score_orders')->get()->toArray();
     
      foreach ($Array as $key => $value) {
            $Array[$key] = (array)$value;
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
       
       return view('admin/hotel_score_order_list', ['hotel_score_order_list' => $paginator]);

       
    }
    
   
    
}
