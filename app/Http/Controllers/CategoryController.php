<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function __construct(protected CategoryService $categoryService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return ApiResponse::success($this->categoryService->getAll());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request): JsonResponse
    {
        $data = $request->only(['name', 'slug']);

        $this->categoryService->create($data);
        $message = 'Category ' . $data['name'] . ' successfully added 🥳';

        return ApiResponse::success(message: $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): JsonResponse
    {
        $data = $category->only(['id', 'name', 'slug']);
        return ApiResponse::success($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category): JsonResponse
    {
        $prevName = $category->name;
        $data = $request->only(['name', 'slug']);

        $this->categoryService->update($data, $category);
        $message = "Category $prevName successfully updated to " . $data['name'];

        return ApiResponse::success($data, $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $name = $this->categoryService->delete($category);

        return ApiResponse::success(message: "Category $name successfully deleted 🎉");
    }
}
