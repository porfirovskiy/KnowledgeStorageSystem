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
    const TABLE = 'projects';

    private $storage;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    public function create(string $name, array $data): bool
    {
        return $this->storage->create(self::TABLE, $name, $data);
    }

    public function get(int $id): array
    {
        return $this->storage->get(self::TABLE, $id);
    }

    public function update(int $id, array $data): bool
    {
        return $this->storage->update(self::TABLE, $id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->storage->delete(self::TABLE, $id);
    }
}