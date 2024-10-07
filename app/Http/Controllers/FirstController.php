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
}
