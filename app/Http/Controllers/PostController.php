<?php


namespace App\Http\Controllers;


use App\Models\Post;

class PostController
{
    public function index()
    {
        $posts = Post::all();

        return view('/posts/index',[
            'title' => 'Posts',
            'posts' => $posts,
        ]);
    }
}

