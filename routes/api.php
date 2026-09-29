<?php

use App\Http\Controllers\ProductController;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products/{id}', [ProductController::class, 'showProduct']);

Route::get('/products', [ProductController::class, 'showActiveProduct']);

Route::post('/products',[ProductController::class, 'createProduct'])
->middleware(CheckAdmin::class);

Route::delete('/products/{id}',[ProductController::class, 'deleteProduct'])
->middleware(CheckAdmin::class);