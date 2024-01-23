<?php

namespace App\Repositories\Category;

use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryRepository implements CategoryInterface
{
    public function getAll(): LengthAwarePaginator
    {
        return Category::select(['slug', 'name'])->paginate(20);
    }

    public function create(array $data): string
    {
        Category::create($data);

        return $data['name'];
    }

    public function delete(Category $category): string
    {
        $name = $category->name;

        $category->delete();

        return $name;
    }
}
