<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('posts', PostController::class)->only([
        'index', 'create', 'store', 'edit', 'update', 'destroy'
    ])->names([
        'index'   => 'posts.index',
        'create'  => 'posts.create',
        'store'   => 'posts.store',
        'edit'    => 'posts.edit',
        'update'  => 'posts.update',
        'destroy' => 'posts.destroy',
    ]);

    Route::get('dashboard', fn () => view('dashboard'))->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::fallback(fn () => abort(404));
