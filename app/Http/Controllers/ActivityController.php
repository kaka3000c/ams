<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Activity;


class ActivityController extends Controller
{
    public function index(Request $request)
    {
       echo 33;
       //$data = Activity::getList();
        //  print_r($data);
       // die();
      //  return $this->json($data);
    }

    
     public function info()
    {
         
          $data = Activity::getInfo();
          print_r($data);
        die();
    }
}
