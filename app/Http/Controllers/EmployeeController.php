<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function create(){
        return view('CreateEmployee');
    }

    public function store(Request $request){
//        $data = new Employee();
//        $data->name=$request->employeename;
//        $data->salary=$request->employeesalary;
//        $data->address=$request->employeeaddress;
//        $data->telephone=$request->employeetelephone;
//        $data->save();

        $request->validate([
            'name'=>'required|',
            'salary'=>'required|numeric',
            'address'=>'required|min:6',
            'telephone'=>'required|max:7'
        ],[
            'required'=>"this field is required"
        ]);

         Employee::create($request->all());
        return redirect()->route('list-employee');
    }

    public function list(){
        $data = Employee::all();
        return view('listemployee')->with('data',$data);

    }

    public function delete($id){
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('list-employee');
    }

    public function view($id){
        $data = Employee::find($id);
        return view('ciewEmployee')->with('data',$data);
    }

    public function edit($id){
        $data = Employee::find($id);
        return view('EditEmployee')->with('data',$data);
    }

    public function update(Request $request,$id){
        $data = Employee::find($id);
//        $data->name=$request->name;
//        $data->salary=$request->salary;
//        $data->address=$request->address;
//        $data->telephone=$request->telephone;
//        $data->save();

        $data->fill($request->all());
        $data->save();
        return redirect()->route('list-employee');
    }
}
