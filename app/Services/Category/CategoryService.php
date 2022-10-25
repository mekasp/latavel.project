<?php

namespace App\Services\Category;

use App\Models\Category;
use App\Models\Post;
use App\Repositories\BaseRepositoryInterface;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Http\Request;

class CategoryService
{
    public $repository;

    public function __construct(BaseRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->all();
    }

    public function show($id)
    {
        return $this->repository->find($id);
    }

    public function store(array $attribute)
    {
        $this->repository->create($attribute);
    }

    public function update(array $attribute, $id)
    {
        $this->repository->update($attribute, $id);
    }

    public function destroy($id)
    {
        $this->repository->delete($id);
    }
}
