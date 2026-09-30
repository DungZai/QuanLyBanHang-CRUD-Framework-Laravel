<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products/{id}', [ProductController::class, 'show']);

Route::get('/products', [ProductController::class, 'index']);

Route::post('/products',[ProductController::class, 'store'])
->middleware(CheckAdmin::class);

Route::put('/products',[ProductController::class, 'update'])
->middleware(CheckAdmin::class);

Route::delete('/products/{id}',[ProductController::class, 'destroy'])
->middleware(CheckAdmin::class);


Route::get('/categories/{id}', [CategoryController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'index']);

Route::post('/categories',[CategoryController::class, 'store'])
->middleware(CheckAdmin::class);

Route::put('/categories',[CategoryController::class, 'update'])
->middleware(CheckAdmin::class);

Route::delete('/categories/{id}',[CategoryController::class, 'destroy'])
->middleware(CheckAdmin::class);

