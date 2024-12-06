<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\CreateProduct;
use App\Livewire\Dashboard\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Livewire\ListProducts;
Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('dashboard', Dashboard::class)->name(name: 'dashboard');
    Route::get('products', ListProducts::class)->name('products');
    // Route::get('/products/create', CreateProduct::class)->name('create.product');

});

require __DIR__.'/auth.php';
