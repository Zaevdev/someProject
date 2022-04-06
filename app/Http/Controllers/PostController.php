<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $post = Post::where('is_published', 1)->get();
        foreach ($post as $posts) {
            echo $posts->title . '</br>';
        }

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

}
