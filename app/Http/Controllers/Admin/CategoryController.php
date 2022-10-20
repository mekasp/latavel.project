<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController
{
    private $validationRules = [
        'title' => ['required', 'min:3'],
        'slug' => ['required', 'min:3'],
    ];

    public function index()
    {
        $categories = Category::paginate(5);

        return view('admin/categories/index', [
            'title' => 'Categories',
            'categories' => $categories
        ]);
    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('admin/categories/show', [
            'title' => 'Category',
            'category' => $category
        ]);
    }

    public function create()
    {
        $category = new Category();

        return view('admin/categories/form', [
            'title' => 'Category create',
            'category' => $category
        ]);
    }

    public function store(Request $request)
    {
        $request->validate($this->validationRules);

        Category::create($request->all());

        return redirect()->route('admin.categories');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin/categories/form-edit', [
            'title' => 'Category update',
            'category' => $category
        ]);
    }

    public function update(Request $request)
    {
        $request->validate($this->validationRules);

        $category = Category::find($request->input('id'));
        $category->update($request->all());

        return redirect()->route('admin.categories');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $posts = Post::where('category_id',$category['id'])->get();
        foreach ($posts as $post) {
            $post->tags()->detach();
            $post->delete();
        }
        $category->delete();

        return redirect()->route('admin.categories');
    }
}

