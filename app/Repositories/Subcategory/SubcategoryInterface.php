<?php

namespace App\Repositories\Subcategory;

use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

interface SubcategoryInterface
{
    public function getAll(): LengthAwarePaginator;
    public function create(array $data): string;
    public function update(array $data, Category $category): string;
    public function checkParentLevel(int $parent_id, int $level): bool;
    public function delete(Category $category): string;
}
