<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post)
    {
        //validate
        request()->validate([
            'body' => 'required'
        ]);

        // the post id will be automatically added to the comment because of the relationship
        $post->comments()->create([
            'user_id' => auth()->id(),
            'body' => request('body')
        ]);

        // return a redirect back to the post page
        return back();
    }
}
