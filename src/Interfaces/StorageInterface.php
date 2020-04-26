<?php

namespace KSS\Interfaces;

interface StorageInterface
{
    public function create(string $table, array $params): bool;

    public function get(string $table, int $id): array;

    public function update(string $table, int $id, array $data): bool;

    public function delete(string $table, array $params): bool;
}