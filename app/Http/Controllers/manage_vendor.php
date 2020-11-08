<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class manage_vendor extends Controller
{
    //
    public function index()
    {
        $data = Vendor::all();
        return view('admin.vendor', ['data' => $data]);
    }

    public function show_all(){   
        $data = Vendor::all();
        return $data;
    }

    public function insert_vendor(Request $req)
    {

        $Vendor = new Vendor;

        $Vendor->companyName = $req->companyName;
        $Vendor->firstName   = $req->firstName;
        $Vendor->lastName    = $req->lastName;
        $Vendor->email       = $req->email;
        $Vendor->password    = $req->password;
        $Vendor->pic         = "";
        $Vendor->Vid         = rand($min=1000, $max=1000000);
        $Vendor->phone       = $req->phone;
        $Vendor->address     = $req->address;

        $Vendor->save();

        return back()->with('msg', 'Data inserted successfully.');
    }

    public function delete_Vendor($id){

        $Vendor = Vendor::find($id);
        $Vendor->delete();
        
        return back()->with('msg', 'Deleted Successfully.');

    }

    public function vendor_single_view($id){

        $data = Vendor::find($id);


        return view('admin.vendor.vendorEdit', ['data' => $data]);
    }

    public function vendor_edit(Request $req){

        $Vendor = Vendor::find($req->vid);

        $Vendor->companyName = $req->companyName;
        $Vendor->firstName   = $req->firstName;
        $Vendor->lastName    = $req->lastName;
        $Vendor->email       = $req->email;
        $Vendor->password    = $req->password;
        $Vendor->pic         = "";
        $Vendor->phone       = $req->phone;
        $Vendor->address     = $req->address;

        $Vendor->save();

        return back()->with('msg', 'Data Updated Successfully.');

    }



}
