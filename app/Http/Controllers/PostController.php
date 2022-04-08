<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();

        return view('post.index', compact('posts'));


    }

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }

    public function show(Post $post) // or $post = Post::findOrFail($id);
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);
        $post->update($data);
        return redirect()->route('post.show', $post->id);
    }

    public function delete()
    {
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('deleted');
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('post.index');
    }

    public function firstOrCreate()
    {

        $post = Post::firstorcreate([
            'title' => 'some interesting content',
        ], [
            'title' => 'some interesting content',
            'content' => 'new content',
            'image' => 'image4.jpg',
            'likes' => 120,
            'is_published' => 1,
        ]);
        dump($post->content);
        dd('finished');

    }

}
