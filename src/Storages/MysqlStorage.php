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

    public function get(string $table, int $id): array
    {
        $query = $this->connection->prepare("SELECT * FROM $table WHERE id=:id");
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function create(string $table, string $name, array $data): bool
    {
        return 1;
    }

    public function update(string $table, int $id, array $data): bool
    {
        // TODO: Implement update() method.
    }

    public function delete(string $table, int $id): bool
    {
        // TODO: Implement delete() method.
    }
}