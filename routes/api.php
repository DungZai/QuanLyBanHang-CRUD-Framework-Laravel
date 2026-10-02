<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->get('/me', [AuthController::class, 'me']);


Route::middleware('auth:api')->get('/products/{id}', [ProductController::class, 'show']);

Route::middleware('auth:api')->get('/products', [ProductController::class, 'index']);

Route::middleware(['auth:api', 'role:admin,staff'])->post('/products', [ProductController::class, 'store']);

Route::middleware(['auth:api', 'role:admin,staff'])->put('/products/{id}', [ProductController::class, 'update']);

Route::middleware(['auth:api', 'role:admin'])->delete('/products/{id}', [ProductController::class, 'destroy']);

Route::post('/products/{id}/inventory/import', [ProductController::class, 'import']);

Route::post('/products/{id}/inventory/export', [ProductController::class, 'export']);

Route::middleware('auth:api')->get('/categories/{id}', [CategoryController::class, 'show']);

Route::middleware('auth:api')->get('/categories', [CategoryController::class, 'index']);

Route::middleware(['auth:api', 'role:admin,staff'])->post('/categories', [CategoryController::class, 'store']);

Route::middleware(['auth:api', 'role:admin,staff'])->put('/categories/{id}',[CategoryController::class, 'update']);

Route::middleware(['auth:api', 'role:admin'])->delete('/categories/{id}', [CategoryController::class, 'destroy']);


Route::middleware('auth:api')->post('/logout',[AuthController::class, 'logout']);

