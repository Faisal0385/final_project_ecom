<?php

use App\Http\Controllers\manage_cart;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\manage_category;
use App\Http\Controllers\manage_customer;
use App\Http\Controllers\manage_employee;
use App\Http\Controllers\manage_inventory;
use App\Http\Controllers\manage_order;
use App\Http\Controllers\manage_product;
use App\Http\Controllers\manage_purchase;
use App\Http\Controllers\manage_vendor;

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

/// URL TO ADMIN HOME PAGE ////
Route::get('/admin/home', function () {
    return view('admin.index');
});


/// URL CATEGORY ////
Route::get('/admin/category', [manage_category::class, 'index']);
Route::post('/admin/category/insert', [manage_category::class, 'insert_cat']);
Route::post('/admin/category/edit', [manage_category::class, 'edit_cat']);
Route::get('/admin/category/single/{id}', [manage_category::class, 'category_single_view']);
Route::get('/admin/category/showAll', [manage_category::class, 'show_all']);
Route::get('/admin/category/delete/{id}', [manage_category::class, 'delete_cat']);


/// URL PRODUCTS ////
Route::get('/admin/product', [manage_product::class, 'index']);
Route::get('/admin/product/showAll', [manage_product::class, 'show_all']);
Route::get('/admin/product/delete/{id}', [manage_product::class, 'delete_pro']);
Route::get('/admin/product/edit/{id}', [manage_product::class, 'product_single_view']);
Route::post('/admin/product/edit', [manage_product::class, 'product_edit']);
Route::post('/admin/product/insert', [manage_product::class, 'insert_pro']);


/// URL EMPLOYEE ////
Route::get('/admin/employee', [manage_employee::class, 'index']);
Route::get('/admin/employee/delete/{id}', [manage_employee::class, 'delete_employee']);
Route::post('/admin/employee/insert', [manage_employee::class, 'insert_employee']);
Route::get('/admin/employee/edit/{id}', [manage_employee::class, 'employee_single_view']);
Route::post('/admin/employee/edit', [manage_employee::class, 'employee_edit']);
Route::get('/admin/employee/showAll', [manage_employee::class, 'show_all']);


/// URL VENDOR ////
Route::get('/admin/vendor', [manage_vendor::class, 'index']);
Route::get('/admin/vendor/delete/{id}', [manage_vendor::class, 'delete_vendor']);
Route::post('/admin/vendor/insert', [manage_vendor::class, 'insert_vendor']);
Route::get('/admin/vendor/showAll', [manage_vendor::class, 'show_all']);
Route::get('/admin/vendor/edit/{id}', [manage_vendor::class, 'vendor_single_view']);
Route::post('/admin/vendor/edit', [manage_vendor::class, 'vendor_edit']);


/// URL CUSTOMERS ////
Route::get('admin/customer', [manage_customer::class, 'index']);
Route::get('admin/customer/delete/{id}', [manage_customer::class, 'delete_customer']);


/// URL PURCHASE ////
Route::get('/admin/purchase', [manage_purchase::class, 'index']);
Route::get('/admin/purchase/delete/{id}', [manage_purchase::class, 'delete_purchase']);
Route::post('/admin/purchase/insert', [manage_purchase::class, 'insert_purchase']);


/// URL ORDER ////
Route::get('/admin/order', [manage_order::class, 'index']);
Route::get('/admin/order/delete/{id}', [manage_order::class, 'delete_order']);


/// URL INVENTORY ////
Route::get('/admin/inventory', [manage_inventory::class, 'index']);
Route::get('/admin/inventory/delete/{id}', [manage_inventory::class, 'delete_inventory']);


########################################################################################
########################################################################################
########################################################################################
############################         Fornt End          ################################
############################                            ################################
########################################################################################
########################################################################################
########################################################################################

/// URL TO FrontEnd HOME PAGE ////
Route::get('/', [manage_product::class, 'show_all_products']);

Route::post('/addCart', [manage_cart::class, 'add_cart']);
Route::get('/removeCart/{id}', [manage_cart::class, 'remove_cart']);
Route::get('/getCartSum', [manage_cart::class, 'get_cart_sum']);
Route::post('/updateQty', [manage_cart::class, 'update_qty']);
Route::get('/productDetailsEdit/{id}', [manage_cart::class, 'product_details_edit']);


Route::get('/products', [manage_product::class, 'all_products']);
Route::get('/productDetails/{id}', [manage_product::class, 'product_details']);



Route::get('/order', [manage_cart::class, 'show_all_cart']);


Route::get('/account', function () {
    return view('frontend.account');
});












