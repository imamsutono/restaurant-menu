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

    public function create(array $data): string
    {
        Category::create($data);

        return $data['name'];
    }

    /**
     * Update subcategory.
     */
    public function update(array $data, Category $category): string
    {
        $category->update($data);

        return $data['name'];
    }

    /**
     * Check the parent level is direct parent of the selected level.
     */
    public function checkParentLevel(int $parent_id, int $level): bool
    {
        $parentLevel = Category::select('level')
            ->whereId($parent_id)
            ->first()->level;

        return $parentLevel === $level - 1;
    }

    public function delete(Category $category): string
    {
        $name = $category->name;

        $category->delete();

        return $name;
    }
}
