<?php

namespace App\Repositories\Subcategory;

use Illuminate\Pagination\LengthAwarePaginator;

interface SubcategoryInterface
{
    public function getAll(): LengthAwarePaginator;
}
