<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LatestController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\isAdminMiddleware;

Route::get('/',[HomeController::class,'index']);
Route::get('/index',[HomeController::class,'index']);

//ADMIN
Route::get('/home',[LatestController::class,'home']);
Route::middleware(['auth','admin:1'])->group(function(){
    Route::get('/latest',[LatestController::class,'index']);
    Route::post('/store',[LatestController::class,'store']);
    Route::get('/users',[AdminController::class,'users']);
    
    //product
    Route::get('/products',[ProductController::class,'index']);
    Route::get('/add-product',[ProductController::class,'create']);
    Route::post('/product-store',[ProductController::class,'store']);
    Route::get('/product-edit/{slug}',[ProductController::class,'edit']);
    Route::post('/product-update/{slug}',[ProductController::class,'update']);
    Route::get('/ product-delete/{id}',[ProductController::class,'delete']);

    //Category
    Route::get('/categories',[CategoryController::class,'index']);
    Route::get('/add-category',[CategoryController::class,'create']);
    Route::post('/category-store',[CategoryController::class,'store']);
    Route::get('/category-edit/{slug}',[CategoryController::class,'edit']);
    Route::post('/category-update/{slug}',[CategoryController::class,'update']);
    Route::get('/ category-delete/{id}',[CategoryController::class,'delete']);
   
    
    //order
    Route::get('/orders',[AdminController::class,'orders']);
    Route::get('/admin-view-order/{id}',[AdminController::class,'viewOrder']);
    Route::post('/update-order/{id}',[AdminController::class,'updateOrder']);
    Route::get('/ completed-orders',[AdminController::class,'completedOrders']);

    //admin-profile
    Route::get('/admin-profile',[AdminController::class,'profile']);
    
   
});


//Auth
route::post('/login',[AuthController::class,'login'])->name('login-user');
Route::get('/loginpage',[AuthController::class,'loginview'])->name('loginpage');
Route::get('/logout',[AuthController::class,'logout']);
Route::get('/register',[AuthController::class,'register']);
Route::post('/register',[AuthController::class,'registerUser'])->name('register-user');


Route::post('/cart',[ProductController::class,'cartpage'])->middleware(['auth','admin:0'])->name('cart');

Route::get('/mycart',[ProductController::class,'mycart'])->middleware(['auth','admin:0']);
Route::post('/increase',[ProductController::class,'increaseCart'])->middleware(['auth','admin:0']);
Route::post('/decrease',[ProductController::class,'decreaseCart'])->middleware(['auth','admin:0']);
Route::post('/update-cart',[ProductController::class,'updateCart'])->middleware(['auth','admin:0'])->name('update-cart');

Route::post('/remove',[ProductController::class,'remove'])->middleware(['auth','admin:0'])->name('remove');

Route::get('/checkout',[ProductController::class,'checkout'])->middleware(['auth','admin:0']);
Route::post('/order',[ProductController::class,'order'])->middleware(['auth','admin:0']);
Route::get('/order-history',[ProductController::class,'orderHistory'])->middleware(['auth','admin:0']);
Route::get('/view-order/{id}',[ProductController::class,'viewOrder'])->middleware(['auth','admin:0']);




Route::get('/category-detail/{id}',[CategoryController::class,'categoryDetail']);
Route::get('/about',[HomeController::class,'about']);
Route::get('/contact',[HomeController::class,'contact']);
Route::get('/blog',[HomeController::class,'blog']);
Route::get('/services',[HomeController::class,'services']);
Route::get('/profile',[HomeController::class,'profile'])->middleware(['auth','admin:0']);

