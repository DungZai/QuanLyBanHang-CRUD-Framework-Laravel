<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/products/{id}', [ProductController::class, 'show']);

Route::middleware('auth:api')->get('/products', [ProductController::class, 'index']);

Route::middleware(['auth:api', 'role:admin,staff'])->post('/products', [ProductController::class, 'store'])
->middleware(CheckRole::class);

Route::middleware(['auth:api', 'role:admin,staff'])->put('/products/{id}', [ProductController::class, 'update'])
->middleware(CheckRole::class);

Route::middleware(['auth:api', 'role:admin,staff'])->delete('/products/{id}', [ProductController::class, 'destroy'])
->middleware(CheckRole::class);


Route::middleware('auth:api')->get('/categories/{id}', [CategoryController::class, 'show']);

Route::middleware('auth:api')->get('/categories', [CategoryController::class, 'index']);

Route::middleware(['auth:api', 'role:admin,staff'])->post('/categories', [CategoryController::class, 'store'])
->middleware(CheckRole::class);

Route::middleware(['auth:api', 'role:admin,staff'])->put('/categories/{id}',[CategoryController::class, 'update'])
->middleware(CheckRole::class);

Route::middleware(['auth:api', 'role:admin,staff'])->delete('/categories/{id}', [CategoryController::class, 'destroy'])
->middleware(CheckRole::class);

Route::post('/login', [AuthController::class, 'login']);

Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:api')->get('/me', [AuthController::class, 'me']);

Route::middleware('auth:api')->post('/logout',[AuthController::class, 'logout']);