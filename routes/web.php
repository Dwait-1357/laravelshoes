<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\OrderController;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/adminproduct',function() {
    return view('product');
});
Route::get('/customer',function(){
    return view('customer');
});
Route::get('/viewuser',[AuthenticationController::class,'viewuser'])->name('viewcustomer');
Route::get('/index',[ProductController::class,'index'])->name('index');
Route::post('/storeproduct',[ProductController::class,'store'])->name('storeproduct');
Route::get('/running', [ProductController::class, 'showRunning'])->name('running');
Route::get('/football', [ProductController::class, 'showFootball'])->name('football');
Route::get('/editproduct/{id}',[ProductController::class,'edit'])->name('editproduct');
Route::put('/updateproduct/{id}',[ProductController::class,'update'])->name('updateproduct');
Route::get('/deleteproduct/{id}',[ProductController::class,'destroy'])->name('deleteproduct');


 Route::get('/',[ProductController::class,'countProduct']);
//  Route::get('/',[OrderController::class,'countOrder']);