<?php

namespace App\Repositories\Category;

use Illuminate\Pagination\LengthAwarePaginator;

interface CategoryInterface
{
    public function getAll(): LengthAwarePaginator;
}
