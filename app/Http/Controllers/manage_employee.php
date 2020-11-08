<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class manage_employee extends Controller
{
    //
    public function index()
    {
        $data = Employee::all();
        return view('admin.employee', ['data' => $data]);
    }

    public function show_all(){   
        $data = Employee::all();
        return $data;
    }

    public function insert_employee(Request $req)
    {

        $Employee = new Employee;

        $Employee->firstName = $req->employee_fname;
        $Employee->lastName  = $req->employee_lname;
        $Employee->email     = $req->employee_email;
        $Employee->password  = $req->employee_password;
        $Employee->pic       = "";
        $Employee->salary    = $req->employee_salary;
        $Employee->jobTitle  = $req->employee_jtitle;
        $Employee->Eid       = rand($min=1000, $max=1000000);
        $Employee->phone     = $req->employee_phone;
        $Employee->address   = $req->employee_address;

        $Employee->save();

        return back()->with('msg', 'Data inserted successfully.');
    }

    public function delete_Employee($id){

        $Employee = Employee::find($id);
        $Employee->delete();
        
        return back()->with('msg', 'Deleted Successfully.');

    }

    public function showAll_Employee(){

        $data = Employee::all();

        return $data;

    }

    public function employee_single_view($id)
    {
        $data = Employee::find($id);
        return view('admin.employee.employeeEdit', ['data' => $data]);
    }

    public function employee_edit(Request $req){

        $Employee = Employee::find($req->employee_id);

        $Employee->firstName = $req->employee_fname;
        $Employee->lastName  = $req->employee_lname;
        $Employee->email     = $req->employee_email;
        $Employee->password  = $req->employee_password;        
        $Employee->salary    = $req->employee_salary;
        $Employee->jobTitle  = $req->employee_jtitle;
        $Employee->phone     = $req->employee_phone;
        $Employee->address   = $req->employee_address;
        $Employee->pic       = "";

        $Employee->save();

        return back()->with('msg', 'Data Updated Successfully.');

    }


}
