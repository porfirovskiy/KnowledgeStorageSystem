<?php
/**
 * Date: 19.04.20
 * Time: 17:21
 */

namespace KSS\Storages;

use KSS\Interfaces\StorageInterface;
use KSS\Storages\DBConnections\MysqlConnection;

class MysqlStorage implements StorageInterface
{
    private $connection;

    public function __construct(MysqlConnection $connection)
    {
        $this->connection = $connection->getInstance();
    }

    public function get(int $id): array
    {
        // TODO: Implement get() method.
    }

    public function create(string $name, array $data): bool
    {
        return 1;
    }

    public function update(int $id, array $data): bool
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id): bool
    {
        // TODO: Implement delete() method.
    }
}