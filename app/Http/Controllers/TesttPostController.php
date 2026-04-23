<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TesttPost;

class TesttPostController extends Controller
{
    public function create()
    {
        return view('testt_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'testt_title' => 'required',
            'testt_content' => 'required'
        ]);

        TesttPost::create([
            'testt_title' => $request->testt_title,
            'testt_content' => $request->testt_content
        ]);

        return redirect('/testt-index');
    }

    public function index()
    {
        $posts = TesttPost::latest()->get();
        return view('testt_index', compact('posts'));
    }
}
