<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Member;
use Illuminate\Support\Facades\Redis;



class RedisController extends Controller
{
     public function testRedis()
     {
          //Redis::setex('name',10, 'guwenjie');
        $values = Redis::get('name');
        dd($values);
     }
}
