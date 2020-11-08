<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class manage_order extends Controller
{
    //
    public function index(){
        //get the value from the DB
        $data = Order::all();
        return view('admin.order', ['data' => $data]);
    }

    public function delete_order($id){

        $Order = Order::find($id);
        $Order->delete();

        return back()->with('msg', 'Deleted Successfully.');

    }


}
