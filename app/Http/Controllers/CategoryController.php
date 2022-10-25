<?php


namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Post;
use App\Repositories\BaseRepositoryInterface;
use App\Repositories\Category\CategoryRepository;
use App\Services\Category\CategoryFacade;
use Illuminate\Http\Request;

class CategoryController
{
    public function index()
    {
        $categories = CategoryFacade::index();

        return view('/categories/index',[
            'title' => 'Categories',
            'categories' => $categories,
        ]);
    }

    public function show($id)
    {
        $category = CategoryFacade::show($id);
        dd($category);
    }

    public function store(Request $request)
    {
        CategoryFacade::create($request->all());

        return redirect()->route('category');
    }

    public function update(Request $request, $id)
    {
        CategoryFacade::update($request->all(), $id);

        return redirect()->route('category');
    }

    public function destroy($id)
    {
        CategoryFacade::delete($id);

        return redirect()->route('category');
    }

    public function posts($id)
    {
        $category = CategoryFacade::show($id);
        $posts = $category->posts()->get();

        return view('/categories/posts',[
            'title' => 'User posts',
            'posts' => $posts
        ]);
    }
}

