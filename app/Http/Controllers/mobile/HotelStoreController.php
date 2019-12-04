<?php

namespace App\Http\Controllers\mobile;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Shop;
use App\Banner;
use App\Store;
use Illuminate\Support\Facades\DB;
//饭店-适用门店

class HotelStoreController extends Controller
{
    public function index(Request $request)
    {
        
        
        $hotel_store_list = DB::table('hotel_stores')->get()->toArray();
        foreach ($hotel_store_list as $key => $value) {
            $hotel_store_list[$key] = (array)$value;
        }
        
        return view('/mobile/store',['hotel_store_list' => $hotel_store_list]);
    }
    
    
    
}
