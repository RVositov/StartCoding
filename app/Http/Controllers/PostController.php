<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function home() {
        $posts = Post::all();
        return View('home', compact('posts'));
    }
    public function index() {
        $posts = Post::all();
        return View('index', compact('posts'));
    }
    public function create() {
        return View('create');
    }
    public function store(Post $post) {
        request()->validate([
            'title' => 'required',
            'date' => 'required'
        ]);
        $post->create([
            'title' => request('title'),
            'date' => request('date')
        ]);
        return redirect()->route('admin');
    }
    public function edit(Post $post) {
        return View('edit', compact('post'));
    }
    public function update(Post $post) {
        request()->validate([
            'title' => 'required',
            'date' => 'required'
        ]);
        $post->update([
            'title' => request('title'),
            'date' => request('date')
        ]);
        return redirect()->route('admin');
    }
    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('admin');
    }
}
