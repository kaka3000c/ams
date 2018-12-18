<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use App\Product;
class ProductController extends Controller
{
     public function index(Request $request)
    {
         $Product = new Product;
        // $product_list = $Product::all()->paginate(5);
          $product_list = Product::orderBy('pro_id', 'desc')->paginate(5);
         //print_r($product_list->toArray());
         $name = 666;
         return view('admin/product_list', ['product_list' => $product_list]);
    }
     public function add(Request $request)
    {
         return view('admin/product_add');
    }
    
     public function insert(Request $request)
    {
          
          
          echo $photo = $request->file('photo');
          echo "</br>";
          echo $extension = $photo->extension();
          echo "</br>";
          $image_name = date('YmdHis', time()).".".$extension;
        
        $store_result = $photo->storeAs('/public/images/product', $image_name);
        $output = [
            'extension' => $extension,
            'store_result' => $store_result
        ];
        print_r($output);
          if ($request->hasFile('photo')) {
    echo 666;
        }
          $name = $request->input('name');
          $Product = new Product;

          $Product->name = $name;
          $Product->image = "/storage/images/product/".$image_name;
          //$Product->content = $content;
          $Product->save();
    }
    
       public function update(Request $request)
    {
        
    }
    
       public function delete(Request $request)
    {
        
    }
}
