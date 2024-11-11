<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //car
    Route::get('/car',[CarController::class, 'index'])->name('car.index');
    Route::get('/car-create',[CarController::class, 'create'])->name('car.create');
    Route::post('/car-store',[CarController::class, 'store'])->name('car.store');
    Route::get('/car-edit/{car}',[CarController::class, 'edit'])->name('car.edit');
    Route::put('/car-update/{car}',[CarController::class, 'update'])->name('car.update');
    Route::get('/car-delete/{id}',[CarController::class, 'destroy'])->name('car.destroy');
    //post
    Route::get('/post',[PostController::class, 'index'])->name('post.index');
    Route::get('/post-create',[PostController::class, 'create'])->name('post.create');
    Route::post('/post-store',[PostController::class, 'store'])->name('post.store');
    Route::get('/post-edit/{post}',[PostController::class, 'edit'])->name('post.edit');
    Route::put('/post-update/{post}',[PostController::class, 'update'])->name('post.update');
    Route::get('/post-delete/{id}',[PostController::class, 'destroy'])->name('post.destroy');
});

require __DIR__.'/auth.php';
