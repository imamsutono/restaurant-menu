<?php

namespace App\Services;

use App\Models\Item;
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

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update(array $data, Item $item)
    {
        return $this->repository->update($data, $item);
    }

    public function delete(Item $item)
    {
        return $this->repository->delete($item);
    }
}
