<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();

        return view('posts', compact('posts'));


    }

    public function create()
    {
        $postsArr = [
            [
                'title' => 'title of post from phpstorm',
                'content' => 'some interesting content',
                'image' => 'image1.jpg',
                'likes' => 0,
                'is_published' => 1,
            ],
            [
                'title' => 'new second title',
                'content' => 'some interesting content, version 2.0',
                'image' => 'image2.jpg',
                'likes' => 0,
                'is_published' => 1,
            ],
            [
                'title' => 'some title',
                'content' => 'so-so content',
                'image' => 'image3.jpg',
                'likes' => 0,
                'is_published' => 1,
            ],
        ];

        foreach ($postsArr as $item) {
            Post::create($item);
        }

        dd('created');
    }

    public function update()
    {
        $post = Post::find(6);

        $post->update([
            'title' => 'updated',
            'content' => 'updated',
            'image' => 'updated',
            'likes' => 0,
            'is_published' => 0,
        ]);
        dd('updated');
    }

    public function delete()
    {
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('deleted');
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
        dump ($post->content);
        dd('finished');

    }

}
