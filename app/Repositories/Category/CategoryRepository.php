<?php

namespace App\Repositories\Category;

use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryRepository implements CategoryInterface
{
    public function getAll(): LengthAwarePaginator
    {
        return Category::select(['id', 'name'])->paginate(20);
    }
}
