<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            // use without('category') to remove category relationship from the query
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->get(),
        ]);
    }

    // {post} is a wildcard
    public function show(Post $post)
    {
        return view('posts.show', [ 'post' => $post ]);
    }
}
