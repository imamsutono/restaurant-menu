<?php

namespace App\Repositories\Category;

use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

interface CategoryInterface
{
    public function getAll(): LengthAwarePaginator;
    public function delete(Category $category): string;
}
