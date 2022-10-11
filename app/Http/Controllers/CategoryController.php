<?php


namespace App\Http\Controllers;


use App\Models\Category;

class CategoryController
{
    public function index()
    {
        $categories = Category::all();

        return view('/categories/index',[
            'title' => 'Categories',
            'categories' => $categories,
        ]);
    }

    public function posts(Category $category)
    {
        $posts = $category->posts()->get();

        return view('/categories/posts',[
            'title' => 'User posts',
            'posts' => $posts
        ]);
    }
}

