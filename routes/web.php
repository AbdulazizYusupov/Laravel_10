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

    Route::get('/car',[CarController::class, 'index'])->name('car.index')->middleware('can:car.index');

    Route::get('/post',[PostController::class, 'index'])->name('post.index')->middleware('can:post.index');

    Route::middleware('check')->group(function () {
        //car
        Route::get('/car-create',[CarController::class, 'create'])->name('car.create')->middleware('can:car.create');
        Route::post('/car-store',[CarController::class, 'store'])->name('car.store')->middleware('can:car.create');
        Route::get('/car-edit/{car}',[CarController::class, 'edit'])->name('car.edit')->middleware('can:car.edit');
        Route::put('/car-update/{car}',[CarController::class, 'update'])->name('car.update')->middleware('can:car.edit');
        Route::get('/car-delete/{id}',[CarController::class, 'destroy'])->name('car.destroy')->middleware('can:car.destroy');
        //post
        Route::get('/post-create',[PostController::class, 'create'])->name('post.create')->middleware('can:post.create');
        Route::post('/post-store',[PostController::class, 'store'])->name('post.store')->middleware('can:post.create');
        Route::get('/post-edit/{post}',[PostController::class, 'edit'])->name('post.edit')->middleware('can:post.edit');
        Route::put('/post-update/{post}',[PostController::class, 'update'])->name('post.update')->middleware('can:post.edit');
        Route::get('/post-delete/{id}',[PostController::class, 'destroy'])->name('post.destroy')->middleware('can:post.destroy');
    });
});
Route::get('/verify',[\App\Http\Controllers\CheckController::class, 'verify'])->name('verify');
Route::get('/check-index',[\App\Http\Controllers\CheckController::class, 'index'])->name('check.index');
Route::post('/check',[\App\Http\Controllers\CheckController::class, 'check'])->name('check');

require __DIR__.'/auth.php';
