<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Fontend\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/about',[HomeController::class,'about'])->name('about');


    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login')->middleware('guest');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])->middleware('guest');


Route::get('/dashboard',[DashboardController::class,'dashboard'])->middleware(middleware: ['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/category', [CategoryController::class, 'category'])->name('category');
    Route::get('/add-category', [CategoryController::class, 'addCategory'])->name('add-category');
    Route::post('/store-category', [CategoryController::class, 'storeCategory'])->name('store-category');
    Route::get('/edit-category/{id}', [CategoryController::class, 'editCategory'])->name('edit-category');
    Route::post('/update-category/{id}', [CategoryController::class, 'updateCategory'])->name('update-category');
    Route::post('/delete-category/{id}', [CategoryController::class, 'deleteCategory'])->name('delete-category');

    Route::get('/post', [PostController::class, 'post'])->name('post');
    Route::get('/add-post', [PostController::class, 'add_post'])->name('add-post');
    Route::post('/store-post', [PostController::class, 'store_post'])->name('store-post');
    Route::get('/edit-post/{id}', [PostController::class, 'editPost'])->name('edit-post');
    Route::post('/update-post/{id}', [PostController::class, 'updatePost'])->name('update-post');
    Route::post('/delete-post/{id}', [PostController::class, 'deletePost'])->name('delete-post');

    Route::get('/slider',);




});

require __DIR__.'/auth.php';
