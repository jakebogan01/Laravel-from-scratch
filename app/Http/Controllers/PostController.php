<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            // use without('category') to remove category relationship from the query
            'posts' => Post::latest()->filter(request(['search']))->get(),
            'categories' => Category::all()
        ]);
    }

    // {post} is a wildcard
    public function show(Post $post)
    {
        return view('post', [ 'post' => $post ]);
    }
}
