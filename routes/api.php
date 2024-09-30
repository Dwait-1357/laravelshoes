<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\OrderController;

use App\Http\Controllers\Api\CartController;




 
//Route::get('/user', function (Request $request) {
  //  return $request->user();
//})->middleware('auth:api');
 
Route::post('register', [AuthenticationController::class, 'register'])->name('register');
Route::post('login', [AuthenticationController::class, 'login'])->name('login');
Route::post('services', [AuthenticationController::class, 'getServices'])->name('services');
Route::get('services/{id}', [AuthenticationController::class, 'services'])->name('servicesid');
Route::get('get-cart-product/{user_id}', [AuthenticationController::class, 'getCartProducts']);





Route::post('running', [AuthenticationController::class, 'getRunning'])->name('getRunning');
Route::post('football', [AuthenticationController::class, 'getFootball'])->name('getFootball');
Route::post('contact', [AuthenticationController::class, 'contact'])->name('contact');
Route::post('order', [OrderController::class,'store'])->name('order');
Route::get('getCart', [OrderController::class,'getCart'])->name('getCart');
Route::post('/save-cart', [OrderController::class, 'saveCart']);
Route::get('/get-cart/{userId}', [OrderController::class, 'getCart']);


Route::post('/cart', [CartController::class, 'addToCart']);
Route::get('/cart/{userId}', [CartController::class, 'getCartItems']);
Route::delete('/cart/{userId}/{itemId}', [CartController::class, 'removeFromCart']);
Route::patch('/cart/{userId}/{itemId}', [CartController::class, 'updateQuantity']);