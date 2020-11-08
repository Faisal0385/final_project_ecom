<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class manage_cart extends Controller
{
    //
    public function add_cart(Request $req)
    {

        $Cart = new Cart;

        $Cart->pid  = $req->product_id;
        $Cart->size = $req->pro_size;
        $Cart->qty  = $req->qty;
        $Cart->save();

        return back()->with('msg', 'Added To Cart.');
    }

    public function show_all_cart()
    {

        $data = DB::table('carts')
            ->join('products', 'products.id', '=', 'carts.pid')
            ->get();

        //return $data;

        return view('frontend.orders', ['data' => $data]);

    }

    public function get_cart_sum()
    {

        $data = Cart::count();
        return $data;
    }

    public function update_qty(Request $req)
    {
        Cart::find($req->id);
        DB::table('carts')
            ->where('id', $req->id)
            ->update(['qty' => $req->qty]);
    }

    public function remove_cart($id)
    {

        $data = Cart::find($id);
        $data->delete();

        return back()->with('msg', 'Remove From Cart.');
    }
}
