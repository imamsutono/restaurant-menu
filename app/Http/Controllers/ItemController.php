<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\StoreItemRequest;
use App\Models\Item;
use App\Services\ItemService;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct(protected ItemService $service)
    {
        
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ApiResponse::success($this->service->getAll());
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
    public function store(StoreItemRequest $request)
    {
        $data = $request->only(['category_id', 'parent_id', 'name', 'slug', 'price']);
        $this->service->create($data);

        return ApiResponse::success('Item ' . $data['name'] . ' successfully added 🥳');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $name = $this->service->delete($item);

        return ApiResponse::success(message: "Item $name successfully deleted 🗑️");
    }
}
