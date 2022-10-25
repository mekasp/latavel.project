<?php

namespace App\Repositories\Category;

use App\Repositories\BaseRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(BaseRepositoryInterface::class, function ($app) {
            return new CategoryRepository();
        });
    }
}
