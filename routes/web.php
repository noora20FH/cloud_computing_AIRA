<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;


Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/blank', [WelcomeController::class, 'blank'])->name('blank');

Auth::routes();

Route::get('/sign-in', [WelcomeController::class, 'SignIn'])->name('auth.sign-in');
Route::get('/sign-up', [WelcomeController::class, 'SignUp'])->name('auth.sign-up');
Route::GET('/user/profile', [WelcomeController::class, 'profile'])->name('userProfile');
Route::put('/user/profile/update', [CustomerController::class, 'profile'])->name('customerData.profile');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');


Route::middleware(['auth','isCustomer'])->group(function(){
    Route::get('/home', [App\Http\Controllers\WelcomeController::class, 'index'])->name('home');
    Route::get('/shop', [WelcomeController::class, 'shop'])->name('shop');
    Route::get('/wishlist', [WelcomeController::class, 'wishlist'])->name('wishlist');

    Route::put('update-order/{id}/{status}',[WelcomeController::class, 'updateOrder']);
    Route::get('/productCustomer', [WelcomeController::class, 'productCustomer'])->name('product');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('add_to_cart', [CartController::class, 'store']);//add-to-cart
    Route::get('/updatecart/{id}/{quantity}', [CartController::class, 'update']);
    Route::get('/deletecart/{carts}', [CartController::class, 'destroy']);

    Route::post('checkout', [CheckoutController::class, 'checkout']);//checkout

    Route::get('/transactionCustomer', [WelcomeController::class, 'transactionCustomer'])->name('transaction');

});

Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard', 'Admin\FrontendController@index');
                                //without calling class name -> 'use App\Http\....'
    // Route::get('categories', 'Admin\CategoryController@index');
    // Route::get('add-category','Admin\CategoryController@add');
    // Route::post('insert-category','Admin\CategoryController@store');
    // Route::get('edit-category/{id}',[CategoryController::class,'edit']);//update-category
    // Route::put('update-category/{id}',[CategoryController::class,'update']);
    
    Route::get('products', 'Admin\ProductController@index');
    Route::get('add-products','Admin\ProductController@add');
    Route::post('insert-product','Admin\ProductController@store');
    Route::post('edit-product','Admin\ProductController@edit');
    Route::get('edit-prod/{id}',[ProductController::class,'edit']);//update-product
    Route::put('update-product/{id}',[ProductController::class,'update']);//update-product
    Route::get('delete-product/{id}',[ProductController::class,'destroy']);//delete-product
    Route::get('detail-product/{id}',[ProductController::class,'show'])->name('admin.product.detail');

    Route::resource('storeData',StoresController::class);

    Route::get('customerData','CustomerController@index');
    Route::get('customerData/create','CustomerController@create');
    Route::post('customerData/store','CustomerController@store');//customerData/destroy
    Route::get('customerData/destroy/{id}',[CustomerController::class,'destroy']);
    Route::get('customerData/show/{id}',[CustomerController::class,'show']);
    Route::get('customerData/edit/{id}',[CustomerController::class,'edit']);
    Route::put('customerData/update/{id}',[CustomerController::class,'update']);
    

    Route::get('/transaction', [WelcomeController::class, 'transaction'])->name('transaction');
    //customerData/update/
    //    Route::resource('transaction',TransactionController::class);
    
});

Route::middleware(['auth','isOwner'])->group(function(){
    // Route::resource('/owner',OwnerController::class);
    Route::get('/owner', 'OwnerController@index');
    Route::get('/productowner', [WelcomeController::class, 'product'])->name('product');
    Route::get('/transactionOwner', [WelcomeController::class, 'transactionOwner'])->name('transaction');
});

