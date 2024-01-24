<?php

namespace App\Services;

use App\Helpers\ActionStatus;
use App\Models\Category;
use App\Repositories\Subcategory\SubcategoryRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class SubcategoryService
{
    public function __construct(protected SubcategoryRepository $repository)
    {
    }

    private function isCategory(int $level): bool
    {
        return $level === config('custom.category_level');
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->repository->getAll();
    }

    public function create(array $data)
    {
        $level = $data['level'];
        if ($this->isCategory($level)) {
            return $this->getResult(ActionStatus::FAIL, 'The level is category, it should subcategory.');
        }

        $isDirectParent = $this->repository->checkParentLevel($data['parent_id'], $level);
        if (!$isDirectParent) {
            return $this->getResult(ActionStatus::FAIL, 'The parent level selected is not the direct parent.');
        }

        $this->repository->create($data); 

        return $this->getResult(ActionStatus::SUCCESS);
    }

    public function update(array $data, Category $category)
    {
        $level = $data['level'];
        if ($this->isCategory($level)) {
            return $this->getResult(ActionStatus::FAIL, 'The level is category, it should subcategory.');
        }

        $isDirectParent = $this->repository->checkParentLevel($data['parent_id'], $level);
        if (!$isDirectParent) {
            return $this->getResult(ActionStatus::FAIL, 'The level of selected parent is not the direct parent.');
        }

        $this->repository->update($data, $category); 

        return $this->getResult(ActionStatus::SUCCESS);
    }

    private function getResult(string $status, string $message = ''): array
    {
        return ['status'  => $status, 'message' => $message];
    }

    public function delete(Category $category): string
    {
        if ($this->isCategory($category->level)) {
            return 'fail';
        }
        return $this->repository->delete($category);
    }
}
