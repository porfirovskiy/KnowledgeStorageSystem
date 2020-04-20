<?php
/**
 * Date: 18.04.20
 * Time: 18:35
 */

namespace KSS;

use KSS\Storages\MysqlStorage;
use KSS\Storages\DBConnections\MysqlConnection;
use KSS\Repositories\ProjectRepository;
use KSS\Repositories\PartRepository;
use KSS\Repositories\PartContentRepository;

class BasicEngine
{
    protected $projectRepository;
    protected $partRepository;
    protected $partContentRepository;

    /**
     * Constructor.
     */
    public function __construct(string $dbHost, int $dbPort, string $dbName, string $dbUser, $dbPassword)
    {
        //get storage
        $mysqlConnection = new MysqlConnection($dbHost, $dbPort, $dbName, $dbUser, $dbPassword);
        $storage = new MysqlStorage($mysqlConnection);

        //get repositories
        $this->projectRepository = new ProjectRepository($storage);
        $this->partRepository = new PartRepository($storage);
        $this->partContentRepository = new PartContentRepository($storage);
    }

    public function createProject(array $params): bool
    {
        return $this->projectRepository->create($params);
    }

    public function getProject(int $id): array
    {
        return $this->projectRepository->get($id);
    }

    public function updateProject(int $id, array $params): bool
    {
        return $this->projectRepository->update($id, $params);
    }

    public function deleteProject(int $id): bool
    {
        return $this->projectRepository->delete($id);
    }

    public function createPart(array $params): bool
    {
        return $this->partRepository->create($params);
    }

    public function getPart(int $id): bool
    {
        return $this->partRepository->get($id);
    }

    public function updatePart(int $id, array $params): bool
    {
        return $this->partRepository->update($id, $params);
    }

    public function deletePart(int $id): bool
    {
        return $this->partRepository->delete($id);
    }

    public function createPartContent(array$params): bool
    {
        return $this->partContentRepository->create($params);
    }

    public function getPartContent(int $id): bool
    {
        return $this->partContentRepository->get($id);
    }

    public function updatePartContent(int $id, array $params): bool
    {
        return $this->partContentRepository->update($id, $params);
    }

    public function deletePartContent(int $id): bool
    {
        return $this->partContentRepository->delete($id);
    }
}