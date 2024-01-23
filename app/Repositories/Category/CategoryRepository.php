<?php

namespace App\Repositories\Category;

use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryRepository implements CategoryInterface
{
    public function getAll(): LengthAwarePaginator
    {
        return Category::select(['slug', 'name', 'level'])->paginate(20);
    }

    public function create(array $data): string
    {
        Category::create($data);

        return $data['name'];
    }

    public function update(array $data, Category $category): string
    {
        $category->update($data);

        return $data['name'];
    }

    public function delete(Category $category): string
    {
        $name = $category->name;

        $category->delete();

        return $name;
    }
}
