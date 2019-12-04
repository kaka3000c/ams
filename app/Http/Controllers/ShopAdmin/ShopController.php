<?php

namespace App\Http\Controllers\ShopAdmin;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Product;
use App\Shop;
use App\Category;

class ShopController extends Controller {

    public function index(Request $request) {
        
        
        $shop_id = $request->session()->get('shop_id');
       
        $shop = DB::table('shops')->where('shop_id',$shop_id)->select(["shop_name","mobile","shop_logo"
            ,"contact","mobile","address","created_at"])->first(); 
        $shop = (array)$shop;
       
        
        return view('shopadmin/shop_index', ['shop' =>$shop ]);
    }

    
}
