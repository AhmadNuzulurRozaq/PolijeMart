<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if(Auth::check()) {
        if (Auth::user()->role == "admin"){
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('customer.index');
    }
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware('admin')->group(function (){
    // ROUTE BARANG + DASHBOARD
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/inventory', [AdminController::class, 'inventory'])->name('admin.inventory');
    Route::get('/inventory/addData', [AdminController::class, 'addData'])->name('admin.addData');
    Route::post('/inventory/addData/storeData', [AdminController::class, 'storeData'])->name('admin.storeData');
    Route::get('/inventory/showData/{id}', [AdminController::class, 'showData'])->name('admin.showData');
    Route::get('/inventory/editData/{id}', [AdminController::class, 'editData'])->name('admin.editData');
    Route::put('/inventory/editData/{id}', [AdminController::class, 'updateData'])->name('admin.updateData');
    Route::delete('/inventory/destroyData/{id}', [AdminController::class, 'destroyData'])->name('admin.destroyData');

    // ROUTE KATEGORI
    Route::get('/category', [AdminController::class, 'manageCategory'])->name('admin.manageCategory');
    Route::get('/category/addCategory', [AdminController::class, 'addCategory'])->name('admin.addCategory');
    Route::post('/category/storeCategory', [AdminController::class, 'storeCategory'])->name('admin.storeCategory');
    Route::get('/category/editCategory/{id}', [AdminController::class, 'editCategory'])->name('admin.editCategory');
    Route::put('/category/updateCategory/{id}', [AdminController::class, 'updateCategory'])->name('admin.updateCategory');
    Route::delete('/category/destroyCategory/{id)', [AdminController::class, 'destroyCategory'])->name('admin.destroyCategory');

    Route::get('/orders', [AdminController::class, 'manageOrder'])->name('admin.manageOrder');
    Route::post('/order/{id}/selesai', [AdminController::class, 'completeOrder'])->name('admin.completeOrder');
});

Route::middleware('user')->group(function (){
    Route::get('/customer', [UserController::class, 'index'])->name('customer.index');
    Route::get('/customer/detail', [UserController::class, 'detailProduct'])->name('customer.detailProduct');
    Route::get('/customer/manage', [UserController::class, 'manageProduct'])->name('customer.manageProduct');
    Route::get('/customer/cart', [UserController::class, 'cartProduct'])->name('customer.cartProduct');
});

require __DIR__.'/auth.php';
