<?php

namespace App\Repositories\Interfaces;

interface BaseRepositoryInterface
{
    public function fetchAll(array $with = [], array $filterable = [], array $order = [], ?int $limit = null): object;

    public function fetch(int $id, array $with = []): object;

    public function store(array $data): object;

    public function update(array $data, int $id): object;

    public function updateOrStore(array $match, array $data): object;

    public function delete(int $id): bool;
}
