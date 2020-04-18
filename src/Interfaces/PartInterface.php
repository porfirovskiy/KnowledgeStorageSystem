<?php
/**
 * Date: 18.04.20
 * Time: 17:58
 */

namespace KnowledgeStorageSystem\Interfaces;

interface PartInterface
{
    public function getPart(int $id): array;
}