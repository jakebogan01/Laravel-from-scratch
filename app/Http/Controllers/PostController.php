<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // view pagination results
//        return Post::latest()->filter(
//            request(['search', 'category', 'author'])
//        )->paginate();

        // use paginate or simplePaginate to view pagination results
        return view('posts.index', [
            // use without('category') to remove category relationship from the query
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->simplePaginate(6)->withQueryString()
        ]);
    }

    // {post} is a wildcard
    public function show(Post $post)
    {
        return view('posts.show', [ 'post' => $post ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
//        ddd(request()->all());
//        ddd(request()->file('thumbnail'));

        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'slug' => 'required|unique:posts,slug',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect('/');
    }
}
