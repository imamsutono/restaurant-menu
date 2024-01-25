<?php

namespace App\Repositories\Item;

use App\Models\Item;
use Illuminate\Pagination\LengthAwarePaginator;

interface ItemInterface
{
    public function getAll(): LengthAwarePaginator;
    public function delete(Item $item): string;
}
