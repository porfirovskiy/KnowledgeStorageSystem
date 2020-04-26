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
    const PDO_CONST_MAP = [
        'integer' => \PDO::PARAM_INT,
        'string' => \PDO::PARAM_STR
    ];
    const DEFAULT_PDO_CONST = \PDO::PARAM_STR;

    private $connection;

    public function __construct(MysqlConnection $connection)
    {
        $this->connection = $connection->getInstance();
    }

    public function create(string $table, array $params): bool
    {
        $insertString = $this->getInsertPreparedString($table, $params);

        $query = $this->getPreparedSqlRequest($insertString, $params);

        return $query->execute();
    }

    public function get(string $table, int $id): array
    {
        $query = $this->connection->prepare("SELECT * FROM $table WHERE id=:id");
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function update(string $table, int $id, array $params): bool
    {
        $updateString = $this->getUpdatePreparedString($table, $params);
        var_dump($updateString);
        $query = $this->getPreparedSqlRequest($updateString, $params);
        $query->bindValue(count($params) + 1, $id, \PDO::PARAM_INT);

        return $query->execute();
    }

    public function delete(string $table, array $params): bool
    {
        $query = $this->connection->prepare("DELETE FROM $table WHERE id=:id");
        $query->bindParam(':id', $params['id'], \PDO::PARAM_INT);

        return $query->execute();
    }

    /**
     *
     * @param string $table
     * @param array $params
     * @return string
     */
    protected function getInsertPreparedString(string $table, array $params): string
    {
        $insertString = "INSERT INTO $table (%s) VALUES (%s)";
        $fields = [];
        $values = [];

        foreach ($params as $field => $value) {
            $fields[] = $field;
            $values[] = "?";
        }

        $insertPreparedString = sprintf($insertString, implode(',', $fields), implode(',', $values));

        return $insertPreparedString;
    }

    /**
     *
     * @param string $table
     * @param array $params
     * @return string
     */
    protected function getUpdatePreparedString(string $table, array $params): string
    {
        $updateString = "UPDATE $table SET %s WHERE id=?";
        $fields = [];

        foreach ($params as $field => $value) {
            $fields[] = $field . "=?";
        }

        $updatePreparedString = sprintf($updateString, implode(',', $fields));

        return $updatePreparedString;
    }

    protected function getPDOConst($value): int
    {
        return (null !== self::PDO_CONST_MAP[gettype($value)]) ? self::PDO_CONST_MAP[gettype($value)] : self::DEFAULT_PDO_CONST;
    }

    protected function getPreparedSqlRequest(string $queryString, array $params): \PDOStatement
    {
        $query = $this->connection->prepare($queryString);
        $increment = 1;
        foreach ($params as $value) {
            $query->bindValue($increment, $value, $this->getPDOConst($value));
            $increment++;
        }

        return $query;
    }
}