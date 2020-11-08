<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use Illuminate\Support\Facades\DB;

class manage_purchase extends Controller
{
    //
    public function index()
    {
        // $data = DB::table('purchases')
        //     ->join('products','products.id','=','purchases.pid')
        //     ->get();

        //return $data;
        $data = Purchase::all();
        return view('admin.purchase', ['data' => $data]);
    }

    public function delete_purchase($id)
    {
        $Purchase = Purchase::find($id);
        $Purchase->delete();
        return back()->with('msg', 'Deleted Successfully.');
    }

    public function insert_purchase(Request $req)
    {

        $Purchase = new Purchase;

        $Purchase->pid           = $req->pur_pro;
        $Purchase->vid           = $req->pur_ven;
        $Purchase->purchase_by   = $req->pur_by;
        $Purchase->price         = $req->pro_price;
        $Purchase->qty           = $req->pro_qty;
        $Purchase->purchase_date = date("d/m/Y");

        $Purchase->save();

        return back()->with('msg', 'Data inserted successfully.');
    }
    
}
