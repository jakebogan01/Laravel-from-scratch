<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
    return view('posts', [
        // use without('category') to remove category relationship from the query
        'posts' => Post::latest()->get(),
        'categories' => Category::all()
    ]);
});

// {post} is a wildcard
Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', [ 'post' => $post ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts,
        'currentCategory' => $category, // 'currentCategory' is a custom variable name, can be anything
        'categories' => Category::all()
    ]);
});

Route::get('/authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts,
        'categories' => Category::all()
    ]);
});
