<?php


namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class UserController
{
    public function index()
    {
        $users = User::all();

        return view('/users/index',[
            'title' => 'Users',
            'users' => $users,
        ]);
    }

    public function posts(User $user)
    {
        $posts = $user->posts()->get();

        return view('/users/posts',[
            'title' => 'User posts',
            'posts' => $posts
        ]);
    }

    public function categoriesPosts( $authorId,  $categoryId)
    {
        $posts = Post::whereHas('user', function (Builder $query) use ($authorId) {
            $query->where('id', $authorId);
        })->where('category_id', $categoryId)->get();

        return view('/users/categoryPosts',[
            'title' => 'User posts',
            'posts' => $posts
        ]);
    }
}

