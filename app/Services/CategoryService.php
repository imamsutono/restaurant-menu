<?php

namespace App\Services;

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
}
