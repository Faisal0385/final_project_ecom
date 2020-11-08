<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class manage_product extends Controller
{
    public function index(){
        return view('admin.product');
    }

    public function show_all()
    {

        $data = DB::table('products')
            ->join('categories','categories.id','=','products.product_cat')
            ->get();
        
        //can not edit
        // $data = Product::get();
        return $data;
    }

    public function product_single_view($id)
    {
        $data = Product::find($id);
        return view('admin.product.productEdit', ['data' => $data]);
    }

    public function product_edit(Request $req)
    {
        $Product = Product::find($req->pro_id);

        $Product->Product_name  = $req->pro_name;
        $Product->product_cat   = $req->pro_cat;
        $Product->product_size  = $req->pro_size;
        $Product->product_price = $req->pro_price;
        $Product->product_des   = $req->pro_des;

        $Product->save();

        return back()->with('msg', 'Data Updated Sucessfully.');
    }

    public function insert_pro(Request $req)
    {
        # code...
        // try{

        // }catch(Throwable $e){

        // }

        //validate input value
        //check empty
        // $validatedData = $req->validate([
        //     'product_name' => 'required|unique:produts|max:255',
        //     'product_price' => 'required|max:255',
        //     'product_size' => 'required|max:255',
        //     'product_cat' => 'required|max:255'
        // ]);

        $Product = new Product;

        $Product->product_name = $req->pro_name;
        $Product->product_cat = $req->pro_cat;
        $Product->product_size = $req->pro_size;
        $Product->product_price = $req->pro_price;
        $Product->product_des = $req->pro_des;
        $Product->product_img = "";


        $Product->save();

        if ($Product->save()) {
            return back()->with('msg', 'Data Inserted Sucessfully.');
        } else {
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function delete_pro($id)
    {
        Product::where('id', $id)->delete();
        return back()->with('msg', 'Data Delete Sucessfully.');
    }




    #############################
    #############################
    #############################
    ######    FRONTEND    #######
    #############################
    #############################
    #############################


    public function show_all_products()
    {
        $data = Product::get();
        return view('frontend.index', ['products' => $data]);
    }

    public function all_products()
    {
        $data = Product::get();
        return view('frontend.products', ['products' => $data]);
    }

    public function product_details($id)
    {  
        $data = Product::find($id);
        return view('frontend.product-details', ['product' => $data]);
    }

}
