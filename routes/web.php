<?php

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

Route::get('/admin/post', [PostController::class, 'index'])->name('all_post');
Route::get('/admin/post/add', [PostController::class, 'create'])->name('create_post');
