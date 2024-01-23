<?php

namespace App\Repositories\Subcategory;

use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

interface SubcategoryInterface
{
    public function getAll(): LengthAwarePaginator;
    public function delete(Category $category): string;
}
