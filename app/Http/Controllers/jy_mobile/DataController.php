<?php

namespace App\Http\Controllers\jy_mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Shop;
use App\Banner;
use App\User;

class DataController extends Controller {

    public function index(Request $request) {

         $user_id = $request->session()->get('user_id');
        

        $service_user = DB::table('service_users')->where('id', $user_id)->first();
        $service_user = (array) $service_user;

        return view('/jy_mobile/data', [ 'user' => $service_user]);
    }

    public function update(Request $request) {
        
        $user_id = $request->session()->get('user_id');
        
        
        $birthday = $request->input('birthday');
       
        $monologue = $request->input('monologue');
        $height = $request->input('height');
        $education = $request->input('education');
        $marry = $request->input('marry');
        $salary = $request->input('salary');
        $car_situation = $request->input('car_situation');
        $housing_situation = $request->input('housing_situation');

        if ($request->hasFile('touxiang')) {
            //更新头像
            $user = DB::table('users')->where('mobile_phone', $mobile)->first();
            $user = (array) $user;
            $user['touxiang'] = str_replace('/storage/images/', '/storage/app/public/images/', $user['touxiang']);

            if (isset($user['touxiang'])) {
                @unlink(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . $user['touxiang']);
            }

            echo $image = $request->file('touxiang');
            echo "</br>";
            echo $extension = $image->extension();
            echo "</br>";
            $image_name = date('YmdHis', time()) . "." . $extension;
            $store_result = $image->storeAs('/public/images/touxiang/', $image_name);
        } else {
            //新上传头像
           // $touxiang = $request->file('touxiang');
           // $extension = $touxiang->extension();

           // $image_name = date('YmdHis', time()) . "." . $extension;
           // $store_result = $touxiang->storeAs('/public/images/touxiang', $image_name);
        }




        DB::table('service_users')->where('id', $user_id)
                ->update(['birthday' => $birthday,
                   
                    'monologue' => $monologue,
                    'height' => $height,
                    'education' => $education,
                    'marry' => $marry,
                    'salary' => $salary,
                    'car_situation' => $car_situation,
                    'housing_situation' => $housing_situation
        ]);

        if ($request->hasFile('touxiang')) {
            DB::table('service_users')->where('id', $user_id)
                    ->update(['touxiang' => "/storage/images/touxiang/" . $image_name]);
        }
    }

}
