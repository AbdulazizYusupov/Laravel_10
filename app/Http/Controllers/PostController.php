<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Student;
use Illuminate\Http\Request;

class PostController
{
    public function index()
    {
        $posts = Post::orderBy('id', 'asc')->paginate(10);
        return view('post.index', ["posts" => $posts]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|max:255',
        ]);

        Post::create($data);

        return redirect()->route('post.index');
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|max:255',
        ]);
        $post->update($data);
        return redirect()->route('post.index')->with('success', 'Post updated successfully');
    }

    public function destroy(Request $request, Post $post)
    {
        $id = $request->id;
        $destroy = Post::findOrFail($id);
        $destroy->delete();
        return redirect()->route('post.index')->with('success', 'Post deleted successfully');
    }
}
