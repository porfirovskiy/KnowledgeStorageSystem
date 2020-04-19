<?php

/**
 * Date: 19.04.20
 * Time: 16:58
 */

namespace KSS\Repositories;

use KSS\Interfaces\RepositoryInterface;
use KSS\Interfaces\StorageInterface;


class ProjectRepository implements RepositoryInterface
{
    private $storage;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    public function create(string $name, array $data): bool
    {
        return $this->storage->create($name, $data);
    }

    public function get(int $id): array
    {
        return $this->storage->get($id);
    }

    public function update(int $id, array $data): bool
    {
        return $this->storage->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->storage->delete($id);
    }
}