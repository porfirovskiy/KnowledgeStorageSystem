<?php
/**
 * Date: 18.04.20
 * Time: 17:58
 */

namespace KnowledgeStorageSystem\Interfaces;

interface ProjectInterface
{
    public function getProject(int $id): array;
}