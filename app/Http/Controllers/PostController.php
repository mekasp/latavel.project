<?php


namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Pagination\Paginator;

class PostController
{
    public function index()
    {
        $posts = Post::with('user', 'category', 'tags')->paginate(5);

        return view('/posts/index',[
            'title' => 'Posts',
            'posts' => $posts,
        ]);
    }
}

