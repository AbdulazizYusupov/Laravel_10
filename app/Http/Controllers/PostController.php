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
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = date('Y-m-d') . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);

            $data['image'] = 'images/' . $filename;
        }

        Post::create($data);

        return redirect()->route('post');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post.show', ["post" => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|max:255',
        ]);
        $title = $request->input('title');
        $body = $request->input('body');
        $post->update([
            'title' => $title,
            'body' => $body,
        ]);
        return redirect()->route('post');
    }

    public function destroy(Request $request, Post $post)
    {
        $id = $request->id;
        $destroy = Post::findOrFail($id);
        $destroy->delete();
        return redirect()->route('post');
    }
}
