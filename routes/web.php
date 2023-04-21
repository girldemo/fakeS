<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('trangchu', [HomeController::class, 'index']);

//-----------------------dang nhap----------------------------//

Route::get('admin', [AdminController::class, 'index']);
Route::get('dashboard', [AdminController::class, 'show_dashboard']);//->middleware('auth');
Route::post('admin-dashboard', [AdminController::class, 'dashboard']);
Route::get('logout', [AdminController::class, 'logout']);

//----------------------danh muc---------------------------//

Route::get('add-category-product', [CategoryProduct::class, 'add_category_product']);
Route::get('all-category-product', [CategoryProduct::class, 'all_category_product']);
Route::post('save-category-product', [CategoryProduct::class, 'save_category_product']);
Route::get('active-category-product/{category_product_id}', [CategoryProduct::class, 'active_category_product']);
Route::get('unactive-category-product/{category_product_id}', [CategoryProduct::class, 'unactive_category_product']);
Route::get('update-category-product/{category_product_id}', [CategoryProduct::class, 'update_category_product']);
//Route::get('delete-category-product', [CategoryProduct::class, 'delete_category_product']);
Route::post('upddate-category-product/{category_product_id}', [CategoryProduct::class, 'upddate_category_product']);

//---------------------thuong hieu-------------------------//

Route::get('add-brand-product', [BrandProduct::class, 'add_brand_product']);
Route::get('all-brand-product', [BrandProduct::class, 'all_brand_product']);
Route::post('save-brand-product', [BrandProduct::class, 'save_brand_product']);
Route::get('active-brand-product/{brand_product_id}', [BrandProduct::class, 'active_brand_product']);
Route::get('unactive-brand-product/{brand_product_id}', [BrandProduct::class, 'unactive_brand_product']);
Route::get('update-brand-product/{brand_product_id}', [BrandProduct::class, 'update_brand_product']);
//Route::get('delete-brand-product', [brandProduct::class, 'delete_brand_product']);
Route::post('upddate-brand-product/{brand_product_id}', [BrandProduct::class, 'upddate_brand_product']);
