<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeResource extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Employee::all();
        return view('listemployee2')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('CreateEmployee2');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        //        $data = new Employee();
//        $data->name=$request->employeename;
//        $data->salary=$request->employeesalary;
//        $data->address=$request->employeeaddress;
//        $data->telephone=$request->employeetelephone;
//        $data->save();

        $request->validate([
            'name'=>'required',
            'salary'=>'required|numeric',
            'address'=>'required|min:6',
            'telephone'=>'required|max:7'
        ],[
            'required'=>"this field is required"
        ]);

        Employee::create($request->all());
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Employee::find($id);
        return view('ciewEmployee2')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Employee::find($id);
        return view('EditEmployee2')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Employee::find($id);
//        $data->name=$request->name;
//        $data->salary=$request->salary;
//        $data->address=$request->address;
//        $data->telephone=$request->telephone;
//        $data->save();

        $data->fill($request->all());
        $data->save();
        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('employee.index');
    }
}
