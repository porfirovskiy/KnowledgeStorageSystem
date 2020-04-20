<?php
/**
 * Date: 20.04.20
 * Time: 15:22
 */

namespace KSS\Repositories;

use KSS\Interfaces\RepositoryInterface;
use KSS\Interfaces\StorageInterface;

class PartRepository implements RepositoryInterface
{
    const ENTITY = 'parts';

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

    public function delete(int $id): bool
    {
        return $this->storage->delete(self::ENTITY, $id);
    }
}