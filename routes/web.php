<?php

use App\Models\Post;
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

Route::get('/', function () {
    return view('posts', [ 'posts' => Post::all() ]);
});

// {post} is a wildcard
Route::get('/posts/{post}', function ($slug) {
    return view('post', [ 'post' => Post::find($slug) ]);
})
// constrain the wildcard to only accept letters and dashes
->where('post', '[A-z-]+');
