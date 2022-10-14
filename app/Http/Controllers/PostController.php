<?php


namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Pagination\Paginator;

class PostController
{
    public function index()
    {
//        $posts = Post::all();

        $posts = Post::paginate(15);

        return view('/posts/index',[
            'title' => 'Posts',
            'posts' => $posts,
        ]);
    }
}

