<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class manage_category extends Controller
{
    //
    public function showAll()
    {
        # code...
        $data = Category::get();
        //return view('admin.category', ['data' => $data]);
        return $data;
    }

    public function showSingleData($id)
    {
        # code...
        $data = Category::where('id', $id)->get();
        //return view('admin.category', ['data' => $data]);
        return $data;
    }

    public function insert_Cat(Request $req)
    {
        # code...
        // try{

        // }catch(Throwable $e){

        // }

        //validate input value
        //check empty
        $validatedData = $req->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);


        $category = new Category;

        $category->category_name = $req->category_name;

        $category->save();

        if($category->save()){
            return back()->with('msg', 'Data Inserted Sucessfully.');
        }else{
            return back()->with('error', 'Something went wrong.');
        }
        
    }

    public function delete_Cat($id)
    {

        Category::where('id', $id)->delete();

        return back()->with('msg', 'Data Delete Sucessfully.');
        
    }

    public function edit_Cat(Request $req)
    {

        // $validatedData = $req->validate([
        //     'category_name' => 'required|unique:categories|max:255',
        // ]);

        $Category = Category::find($req->cat_id);
        $Category->category_name = $req->category_edit_name;
        $Category->save();

        return 1;


    }
}
