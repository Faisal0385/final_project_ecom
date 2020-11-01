<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class manage_product extends Controller
{
    //
    public function showAll()
    {
        # code...
        $data = Product::get();
        //return view('admin.category', ['data' => $data]);
        return $data;
    }

    public function showSingleData($id)
    {
        # code...
        $data = Product::where('id', $id)->get();
        //return view('admin.category', ['data' => $data]);
        return $data;
    }

    public function insert_Pro(Request $req)
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

        if($Product->save()){
            return back()->with('msg', 'Data Inserted Sucessfully.');
        }else{
            return back()->with('error', 'Something went wrong.');
        }
        
    }

    public function delete_Pro($id)
    {

        Product::where('id', $id)->delete();

        return back()->with('msg', 'Data Delete Sucessfully.');
        
    }

    public function edit_Cat(Request $req)
    {

        // $validatedData = $req->validate([
        //     'category_name' => 'required|unique:categories|max:255',
        // ]);

        $Category = Product::find($req->cat_id);
        $Category->category_name = $req->category_edit_name;
        $Category->save();

        return 1;


    }
}
