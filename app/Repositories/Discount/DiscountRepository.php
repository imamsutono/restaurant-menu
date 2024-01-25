<?php

namespace App\Repositories\Discount;

use App\Helpers\ActionStatus;
use App\Models\Discount;

class DiscountRepository implements DiscountInterface
{
    public function create(array $data): string
    {
        Discount::create($data);

        return ActionStatus::SUCCESS;
    }
}
