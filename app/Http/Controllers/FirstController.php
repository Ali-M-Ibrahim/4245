<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    function myfunction(){
        return "this is my message from controller";
    }

    function myfunction2(){
        return 123456;
    }

    function myfunction3(){
        return response()->json(['name'=>'ali']);
    }

    function myfunction4(Request $request){
        $variable1 = $request->firstname;
        $varibale = $request->input('age',28);
        $headerdata = $request->header('mykey');
        return "the firstname used in the body is: ".$variable1;
    }


}
