<?php

namespace App\Repositories\Discount;

interface DiscountInterface
{
    public function create(array $data): string;
}
