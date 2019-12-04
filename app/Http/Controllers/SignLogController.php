<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\SignLog;
class SignLogController extends Controller
{
    public function  insert(Request $request,$id){
        
        //$id = $request->input('id', '9');
        echo $id;
        
        $SignLog = new SignLog;

        $SignLog->user_id = $id;

        $SignLog->save();
    }
}
