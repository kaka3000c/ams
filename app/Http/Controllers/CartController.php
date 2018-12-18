<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Cart;

class CartController extends Controller {

    public function index(Request $request) {
        $name = $request->session()->get('name');
        $user_id = $request->session()->get('user_id');
        $pro_id = $request->input('pro_id');

        if(!empty($pro_id)){
        $product = Cart::where('pro_id', $pro_id)->first();
        if (!empty($product)) {
            //商品数量+1
            $product = $product->toArray();
           // print_r($product);
            $Cart = Cart::find($product['id']);
            $Cart->num =  $product['num']+1;
            $Cart->save();
             
        } else {
            //新增进购物车
            $Cart = new Cart;
            $Cart->pro_id = $pro_id;
            $Cart->num = 1;
            $Cart->user_id = $user_id;
            $Cart->save();
        }
        }
        //读取出登录用户购物车的产品
      
       
        //$cart_product = DB::select('select * from carts where user_id = ?', [$user_id]);
        //print_r($cart_product);
       // echo "</br>";
       $cart_product_1 = Cart::where('user_id', $user_id)->get();
      // $cart_product_1 = $cart_product_1->toArray();
       // print_r($cart_product_1);
       // echo "</br>";
       // foreach ($cart_product_1 as  $k=>$v){
        //   $cart_product_1[$k] =  (Object)$v;
        //}
      //  print_r($cart_product_1);
      //;die();
return view('cart', ['cart_product' => $cart_product_1]);
       // return view('cart', compact('cart_product') );
    }

}
