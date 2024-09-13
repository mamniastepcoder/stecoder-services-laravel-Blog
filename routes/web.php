<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
 

Route::get('/', function () {
    return view('welcome');
});
Route::get('register',[UserController::class,'register'])->name('register');
Route::post('register/insert',[UserController::class,'registerInsert'])->name('register.insert');
Route::get('login',[UserController::class,'loginForm'])->name('login');
Route::post('login/insert',[UserController::class,'login'])->name('login.form');
Route::get('logout',[UserController::class,'logout'])->name('logout');
Route::get('posts',[PostController::class,'index'])->name('posts');
Route::get('/posts/view/{id}', [PostController::class, 'view'])->name('posts.view');

// Routes  authentication
Route::middleware('auth')->group(function () {
Route::get('posts/create',[PostController::class,'create'])->name('posts.create');
Route::post('/posts/insert', [PostController::class, 'insert'])->name('posts.insert');
Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
Route::post('/posts/update/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/delete/{id}', [PostController::class, 'delete'])->name('posts.delete');

});

