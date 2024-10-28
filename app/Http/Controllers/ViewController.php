<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ViewController extends Controller
{
    public function index(){
        $data= "this is my string";
        $data2= "28/10/2024";
        $this->prepareData();
        return view('index')
            ->with('mystring',$data)
            ->with('mydate',$data2);
    }

    public function index2(){
        $mystring= "this is my string";
        $mydate= "28/10/2024";
        $this->prepareData();
        return view('index',compact(['mystring','mydate']));
    }

    public function index3(){
        $mystring= "this is my string";
        $mydate= "28/10/2024";
        $this->prepareData();
        return view('index',['mystring'=>$mystring, 'mydate'=>$mydate]);
    }

    function prepareData()
    {
        $datafromoutside = "this is the data from function";
        \View::share(['general'=>$datafromoutside]);

    }

    function getCustomersScreen()
    {
        //select * from customers
        $data = Customer::all();

        return view('ListCustomer')
            ->with('data',$data);
    }

    function getSingleCustomerScreen($id){
        //select * from customers where id=?
        $data = Customer::find($id);
        return view('ViewCustomer')
            ->with('data',$data);
    }
}
