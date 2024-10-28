<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function getAllCustomers(){
        // select * from customers
        $data = Customer::all();
        return $data;
    }

    function getCustomerById($id){
        //select * from customers where id=?
        $data = Customer::find($id);
        return $data;
    }

    function getCustomerWithCondition(){
        //select * from customers where balance > 0
        $data = Customer::where('balance','>',0)
            ->get();
        return $data;
    }

    function addCustomer(){
        $data = new Customer();
        $data->name = 'Ali Ibrahim';
        $data->balance = 100;
        $data->address="Beirut";
        $data->dob="2024-04-04";
        $data->save();
        return response()->json(["status"=>"created"]);
    }

    function addCustomer2(){
        Customer::create([
            'name'=>'Ali Ibrahim 2',
            'balance'=>200,
            'address'=>'baabda',
            'dob'=>'2020-04-04'
        ]);
        return response()->json(["status"=>"created"]);
    }

    function addCustomer3(Request $request){
        Customer::create($request->all());
        return response()->json(["status"=>"created"]);
    }

    function updateCustomer1(){
        // select * from customers where id=1
        $data = Customer::find(1);
        $data->name="Ali Ibrahim updated";
        $data->balance = 1000;
        $data->address="Beirut update";
        $data->dob="1990-04-04";
        $data->save();
        return response()->json(["status"=>"updated"]);
    }

    function updateCustomer2(Request $request, $id){
        $data = Customer::find($id);
        $data->name= $request->name;
        $data->balance =$request->balance;
        $data->address= $request->address;
        $data->dob=$request->dob;
        $data->save();
        return response()->json(["status"=>"updated"]);
    }

    function updateCustomer3(Request $request){
        $data = Customer::find($request->id);
        $data->name= $request->name;
        $data->save();
        return response()->json(["status"=>"updated"]);
    }

    function massUpdate(){
        // update customers set name="ali" where id>0;
        $data = Customer::where('id','>',0)
            ->update(['name'=>'ali']);
        return response()->json(["status"=>"updated"]);
    }


    function deleteCustomer($id){
        $data = Customer::find($id);
        $data->delete();
        return response()->json(["status"=>"deleted"]);
    }

    function massDelete(){
        Customer::where('id','>',0)
            ->delete();
        return response()->json(["status"=>"deleted"]);
    }


    function updateCustomer4(Request $request, $id){
        $data = Customer::find($id);
        $data->fill($request->all());

        if($data->isClean()){
            return "please update the data";
        }

        $data->save();
        return response()->json(["status"=>"updated"]);

    }
}
