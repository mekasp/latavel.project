<?php

namespace App\Services\Category;

use Illuminate\Support\Facades\Facade;

class CategoryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'categoryService';
    }
}
