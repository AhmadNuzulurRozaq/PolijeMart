<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route untuk mengambil semua produk (Katalog API)
Route::get('/products', [ProductController::class, 'index']);

// Route untuk mengambil detail 1 produk
Route::get('/products/{id}', [ProductController::class, 'show']);

// Route untuk menambahkan produk baru
Route::post('/products', [ProductController::class, 'store']);

// Route untuk mengubah data produk
Route::put('/products/{id}', [ProductController::class, 'update']);

// Route untuk menghapus produk
Route::delete('/products/{id}', [ProductController::class, 'destroy']);