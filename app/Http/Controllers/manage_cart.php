<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class manage_cart extends Controller
{
    //
    public function add_cart(Request $req)
    {

        $check_dup_pro = Cart::where('pid', $req->product_id)->first();

        if (!$check_dup_pro) {

            $Cart = new Cart;

            $Cart->pid  = $req->product_id;
            $Cart->size = $req->pro_size;
            $Cart->qty  = $req->qty;
            $Cart->save();

            return back()->with('msg', 'Added To Cart.');
        } else {
            return back()->with('msg', 'Product already exist Cart.');
        }
    }

    public function show_all_cart()
    {

        $data = DB::table('carts')
            ->join('products', 'products.id', 'carts.pid')
            ->select('carts.id as carts_id', 'carts.*', 'products.*')
            ->get();
        //return $data;
        return view('frontend.orders', ['data' => $data]);
    }

    public function get_cart_sum()
    {

        $data = Cart::count();
        return $data;
    }



    public function remove_cart($id)
    {

        $data = Cart::where('pid', $id)->first();

        $data->delete();

        return back()->with('msg', 'Removed From Cart.');
    }



    public function update_qty(Request $req)
    {

        $data = Cart::where('pid', $req->id)->first();
        $data->qty = $req->qty;
        $data->save();

        return back()->with('msg', 'Quantity Updated.');
    }

    public function product_details_edit($id)
    {

        $data = DB::table('carts')
            ->join('products', 'products.id', 'carts.pid')
            ->select('carts.id as carts_id', 'carts.*', 'products.*')
            ->where('carts.id', $id)
            ->get();
        
        //why it's returning as object
        //return dd($data[0]);

        return view('frontend.orders.product-details-edit', ['product' => $data[0]]);
    }
}
