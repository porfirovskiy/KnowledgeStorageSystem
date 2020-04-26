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
    const ENTITY = 'projects';

    private $storage;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    public function create(array $params): bool
    {
        return $this->storage->create(self::ENTITY, $params);
    }

    public function get(int $id): array
    {
        return $this->storage->get(self::ENTITY, $id);
    }

    public function update(int $id, array $params): bool
    {
        return $this->storage->update(self::ENTITY, $id, $params);
    }

    public function delete(array $params): bool
    {
        return $this->storage->delete(self::ENTITY, $params);
    }
}