<?php
/**
 * Date: 18.04.20
 * Time: 17:58
 */

namespace KSS\Interfaces;

interface RepositoryInterface
{
    public function create(array $params): bool;

    public function get(int $id): array;

    public function update(int $id, array $data): bool;

    public function delete(array $params): bool;
}