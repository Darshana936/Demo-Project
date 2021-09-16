<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\RoleViewController;
use App\Http\Controllers\usercontroller;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/home',function(){
    return view('home');
});*/

//Route::get('/index',[usercontroller::class,'index']);

Route::view('/dashboard','layouts.master');
Route::view('/home','home');
Route::get('create',[RoleViewController::class,'get_role']);
Route::post('create',[RoleViewController::class,'store'])->name('creat-user');

Route::get('/usershow',[RoleViewController::class,'get_user'])->name('user-show');

Route::get('/userdelete/{id}',[RoleViewController::class,'destroy']);

Route::get('useredit/{id}',[RoleViewController::class,'edit']);
Route::post('useredit',[RoleViewController::class,'update'])->name('useredited');
//Route::get('useredit/{id}',[RoleViewController::class,'get_roleforedit'])->name('');

// -------------BANNER-------------------------------------------------------------------------
Route::get('banner-create',[BannerController::class,'createBanner']);
Route::post('banner-create',[BannerController::class,'storeBanner'])->name('bannerCreate');

Route::get('banner-list',[BannerController::class,'bannerGet'])->name('banner-show');

Route::get('banner-edit/{id}',[BannerController::class,'bannerEdit']);
Route::post('banner-edit',[BannerController::class,'bannerUpdate'])->name('banner-edited');

Route::get('banner-delete/{id}',[BannerController::class,'bannerDestroy']);


// -------------CATEGORY-------------------------------------------------------------------------
Route::get('category-create',[CategoryController::class,'create']);
Route::post('category-create',[CategoryController::class,'store'])->name('create-store');

Route::get('category-list',[CategoryController::class,'show'])->name('category-list');

Route::get('category-edit/{id}',[CategoryController::class,'edit']);
Route::post('category-edit',[CategoryController::class,'update'])->name('category-edited');

Route::get('category-delete/{id}',[CategoryController::class,'destroy']);

// -------------PRODUCT-------------------------------------------------------------------------
Route::get('product-create',[ProductController::class,'create']);
Route::post('product-create',[ProductController::class,'store'])->name('productCreate');

Route::get('product-list',[ProductController::class,'show'])->name('product-list');

Route::get('product-edit/{id}',[ProductController::class,'edit']);
Route::post('product-edit',[ProductController::class,'update'])->name('product-edited');

Route::get('product-delete/{id}',[ProductController::class,'destroy']);

// -------------PRODUCT-IMAGE-------------------------------------------------------------------------
Route::get('image-create',[ProductImageController::class,'create']);
Route::post('image-create',[ProductImageController::class,'store'])->name('imageCreate');

Route::get('image-list',[ProductImageController::class,'show'])->name('image-list');

Route::get('image-edit/{id}',[ProductImageController::class,'edit']);
Route::post('image-edit',[ProductImageController::class,'update'])->name('image-edited');

Route::get('image-delete/{id}',[ProductImageController::class,'destroy']);
