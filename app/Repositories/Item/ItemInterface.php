<?php

namespace App\Repositories\Item;

use Illuminate\Pagination\LengthAwarePaginator;

interface ItemInterface
{
    public function getAll(): LengthAwarePaginator;
}
