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

    public function create(array $data): string
    {
        Item::create($data);

        return $data['name'];
    }

    public function update(array $data, Item $item): string
    {
        $item->update($data);

        return $data['name'];
    }

    public function delete(Item $item): string
    {
        $name = $item->name;

        $item->delete();

        return $name;
    }
}
