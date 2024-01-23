<?php

namespace App\Repositories\Subcategory;

use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

class SubcategoryRepository implements SubcategoryInterface
{
    public function getAll(): LengthAwarePaginator
    {
        return Category::select(['name', 'slug', 'level'])
            ->where('level', '>', 0)
            ->paginate(20);
    }
}
