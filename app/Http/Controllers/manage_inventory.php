<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class manage_inventory extends Controller
{
    //
    public function index(){

        //get all the data from db 
        $data = Inventory::all();

        return view('admin.inventory', ['data' => $data]);

    }

    public function delete_inventory($id){

        $Inventory = Inventory::findorfail($id);

        $Inventory->delete();

        return back()->with('msg', 'Deleted Successfully.');

    }
}
