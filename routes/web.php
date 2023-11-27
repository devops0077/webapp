<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\PostController;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Web Routes

Route::get('/', [WebController::class, 'homepage'])->name('homepage');
Route::get('/about', [WebController::class, 'about'])->name('about');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// POST ROUTES
Route::get('/admin/post', [PostController::class, 'index'])->name('all_post');
Route::get('/admin/post/add', [PostController::class, 'create'])->name('create_post');
Route::post('/admin/post/add', [PostController::class, 'store'])->name('save_post');
Route::get('/admin/post/{id}', [PostController::class, 'show'])->name('show_post');
Route::get('/admin/post/{post}/edit', [PostController::class, 'edit'])->name('edit_post');
Route::post('/admin/post/{post}/update', [PostController::class, 'update'])->name('update_post');
Route::get('/admin/post/{post}/delete', [PostController::class, 'destroy'])->name('delete_post');


// CATEGORY ROUTES
Route::get('/admin/category', [CategoryController::class, 'index'])->name('all_categories');
Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('create_category');
Route::post('/admin/category/create', [CategoryController::class, 'store'])->name('save_category');
Route::get('/admin/category/{id}', [CategoryController::class, 'show'])->name('show_category');
Route::get('/admin/category/{category}/edit', [CategoryController::class, 'edit'])->name('edit_category');
Route::post('/admin/category/{category}/update', [CategoryController::class, 'update'])->name('update_category');
Route::get('/admin/category/{category}/delete', [CategoryController::class, 'destroy'])->name('delete_category');
