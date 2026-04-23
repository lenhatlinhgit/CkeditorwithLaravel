<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function create()
    {
        return view('post_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect('/posts');
    }

    public function index()
    {
        $posts = Post::latest()->get();
        return view('post_index', compact('posts'));
    }
}