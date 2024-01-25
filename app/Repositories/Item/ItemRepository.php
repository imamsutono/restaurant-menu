<?php

namespace App\Repositories\Item;

use App\Models\Item;
use Illuminate\Pagination\LengthAwarePaginator;

class ItemRepository implements ItemInterface
{
    public function getAll(): LengthAwarePaginator
    {
        return Item::select(['name', 'price', 'category_id', 'slug'])
            ->with('category:id,name')
            ->paginate(20);
    }
}
