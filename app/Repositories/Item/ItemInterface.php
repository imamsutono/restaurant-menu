<?php

namespace App\Repositories\Item;

use App\Models\Item;
use Illuminate\Pagination\LengthAwarePaginator;

interface ItemInterface
{
    public function getAll(): LengthAwarePaginator;
    public function create(array $data): string;
    public function update(array $data, Item $item): string;
    public function delete(Item $item): string;
}
