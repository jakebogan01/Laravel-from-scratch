<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::latest()->paginate(6)
        ]);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'image',
            'slug' => ['required', Rule::unique('posts')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);

        if(isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }
        $post->update($attributes);

        return back()->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post deleted successfully!');
    }
}
