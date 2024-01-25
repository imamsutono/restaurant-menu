<?php

namespace App\Services;

use App\Repositories\Item\ItemRepository;

class ItemService
{
    public function __construct(protected ItemRepository $repository)
    {
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }
}
