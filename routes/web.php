<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\manage_category;
use App\Http\Controllers\manage_product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/admin/home', function () {
    return view('admin.index');
});

Route::get('/admin/category', function () {
    return view('admin.category');
});

Route::get('/admin/product', function () {
    return view('admin.product');
});

Route::post('/insertCat', [manage_category::class, 'insert_Cat']);
Route::post('/editCat', [manage_category::class, 'edit_Cat']);
Route::get('/showSingleData/{id}', [manage_category::class, 'showSingleData']);
Route::get('/showCat', [manage_category::class, 'showAll']);
Route::get('/deleteCat/{id}', [manage_category::class, 'delete_Cat']);



Route::post('/insertPro', [manage_product::class, 'insert_Pro']);
Route::post('/editPro', [manage_product::class, 'edit_Pro']);
Route::get('/showSinglePro/{id}', [manage_product::class, 'showSingleData']);
Route::get('/showPro', [manage_product::class, 'showAll']);
Route::get('/deletePro/{id}', [manage_product::class, 'delete_Pro']);