<?php

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
    return view('posts');
});

// {post} is a wildcard
Route::get('/posts/{post}', function ($slug) {
    // get path to html resources/posts
    $pathToPost = __DIR__ . "/../resources/posts/{$slug}.html";

    // check if file exists if not redirect to home page
    if (! file_exists($pathToPost)) {
        // abort(404);
        return redirect('/');
    }

    // get content of the file
    $post = file_get_contents($pathToPost);

    return view('post', [
        'post' => $post
    ]);
})
// constrain the wildcard to only accept letters and dashes
->where('post', '[A-z-]+');
// ->whereNumber('post');
// ->whereAlpha('post');
