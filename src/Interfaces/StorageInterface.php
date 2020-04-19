<?php

namespace KSS\Interfaces;

interface StorageInterface
{
    public function create(string $name, array $data): bool;

    public function get(int $id): array;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}