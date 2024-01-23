<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryService
{
    public function __construct(protected CategoryRepository $categoryRepository)
    {
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->categoryRepository->getAll();
    }

    public function create(array $data): string
    {
        return $this->categoryRepository->create($data);
    }

    public function delete(Category $category)
    {
        return $this->categoryRepository->delete($category);
    }
}
