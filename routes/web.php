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
    // fetch all posts in Post model
    $posts = Post::all();

    return view('posts', [ 'posts' => $posts ]);
});

// {post} is a wildcard
Route::get('/posts/{post}', function ($slug) {
    // calls find method in Post model
    $post = Post::find($slug);

    return view('post', [ 'post' => $post ]);
})
// constrain the wildcard to only accept letters and dashes
->where('post', '[A-z-]+');
