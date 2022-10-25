<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Models\Post;
use App\Repositories\BaseRepositoryInterface;

class CategoryRepository implements BaseRepositoryInterface
{
    public function all()
    {
        return Category::all();
    }

    public function find(int $id)
    {
        return Category::find($id);
    }

    public function create(array $parameters)
    {
        return Category::create($parameters);
    }

    public function update(array $parameters, int $id)
    {
        $category = $this->find($id);
        $category->update($parameters);
        return $category;
    }

    public function delete(int $id)
    {
        $category = $this->find($id);
        $posts = Post::where('category_id',$category['id'])->get();
        foreach ($posts as $post) {
            $post->tags()->detach();
            $post->delete();
        }
        $category->delete();
        return $category;
    }

}
