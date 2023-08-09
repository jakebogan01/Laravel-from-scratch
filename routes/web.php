<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
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

// single action controller
Route::post('/newsletter', NewsletterController::class);

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::post('/posts/{post:slug}/comments', [CommentController::class, 'store']);

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('/sessions', [SessionsController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('/admin/posts', [AdminPostController::class, 'index'])->middleware('admin');
Route::get('/admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('admin');
Route::patch('/admin/posts/{post}', [AdminPostController::class, 'update'])->middleware('admin');
Route::delete('/admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware('admin');

Route::get('/admin/posts/create', [PostController::class, 'create'])->middleware('admin');
Route::post('/admin/posts', [PostController::class, 'store'])->middleware('admin');
