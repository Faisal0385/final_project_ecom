<?php

namespace App\Http\Controllers;
use App\Models\Customer;


use Illuminate\Http\Request;

class manage_customer extends Controller
{
    //
    public function index(){

        $data = Customer::all();

        return view('admin.customer', ['data' => $data]);

    }

    //delete data
    public function delete_customer($id){

        $Customer = Customer::find($id);

        $Customer->delete();

        return back()->with('msg','Deleted successfully.');
        

    }
}
