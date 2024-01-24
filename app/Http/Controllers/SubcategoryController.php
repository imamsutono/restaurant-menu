<?php

namespace App\Http\Controllers;

use App\Helpers\ActionStatus;
use App\Helpers\ApiResponse;
use App\Models\Category;
use App\Models\Subcategory;
use App\Http\Requests\StoreSubcategoryRequest;
use App\Http\Requests\UpdateSubcategoryRequest;
use App\Services\SubcategoryService;
use Illuminate\Http\JsonResponse;

class SubcategoryController extends Controller
{
    public function __construct(protected SubcategoryService $subcategoryService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return ApiResponse::success($this->subcategoryService->getAll());
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
    public function store(StoreSubcategoryRequest $request)
    {
        $data = $request->only(['name', 'slug', 'level', 'parent_id']);
        $newData = $this->subcategoryService->create($data);

        if ($newData['status'] === ActionStatus::FAIL) {
            return ApiResponse::fail($newData['message']);
        }

        return ApiResponse::success('Subcategory ' . $data['name'] . ' successfully added 🥳');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
        $data = $subcategory->only(['id', 'name', 'level', 'parent_id']);
        return ApiResponse::success($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubcategoryRequest $request, Subcategory $subcategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $subcategory): JsonResponse
    {
        $del = $this->subcategoryService->delete($subcategory);

        if ($del === 'fail') {
            return ApiResponse::fail('Oh no, you want to delete category, not subcategory.');
        }
        return ApiResponse::success(message: "Subcategory $del successfully deleted 🎉");
    }
}
