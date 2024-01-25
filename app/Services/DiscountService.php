<?php

namespace App\Services;

use App\Repositories\Discount\DiscountRepository;

class DiscountService
{
    public function __construct(protected DiscountRepository $repository)
    {
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }
}
