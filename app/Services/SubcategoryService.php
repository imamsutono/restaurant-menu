<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\Subcategory\SubcategoryRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class SubcategoryService
{
    public function __construct(protected SubcategoryRepository $subcategoryRepository)
    {
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->subcategoryRepository->getAll();
    }

    public function delete(Category $category): string
    {
        if ($category->level === config('custom.category_level')) {
            return 'fail';
        }

        return 'ok';
    }
}
