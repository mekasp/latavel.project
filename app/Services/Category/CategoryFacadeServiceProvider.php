<?php

namespace App\Services\Category;

use App\Repositories\BaseRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class CategoryFacadeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('categoryService', function ($app) {
            return new CategoryService(
                $app->make(BaseRepositoryInterface::class)
            );
        });
    }
}
