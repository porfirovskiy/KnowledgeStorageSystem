<?php

namespace KSS\Interfaces;

interface StorageInterface
{
    public function create(string $table, string $name, array $data): bool;

    public function get(string $table, int $id): array;

    public function update(string $table, int $id, array $data): bool;

    public function delete(string $table, int $id): bool;
}