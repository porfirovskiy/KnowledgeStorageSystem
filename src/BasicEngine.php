<?php
/**
 * Date: 18.04.20
 * Time: 18:35
 */

namespace KSS;

use KSS\Storages\MysqlStorage;
use KSS\Storages\DBConnections\MysqlConnection;
use KSS\Repositories\ProjectRepository;

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
        $mysqlConnection = new MysqlConnection($dbHost, $dbPort, $dbName, $dbUser, $dbPassword);

        $storage = new MysqlStorage($mysqlConnection);

        $this->projectRepository = new ProjectRepository($storage);
    }

    public function createProject(string $name, array $data): bool
    {
        return $this->projectRepository->create($name, $data);
    }

    public function getProject(int $id): bool
    {
        return $this->projectRepository->get($id);
    }

    public function updateProject(int $id, array $data): bool
    {
        return $this->projectRepository->update($id, $data);
    }

    public function deleteProject(int $id): bool
    {
        return $this->projectRepository->delete($id);
    }

    public function createPart(string $name, array $data): bool
    {
        return $this->partRepository->create($name, $data);
    }

    public function getPart(int $id): bool
    {
        return $this->partRepository->get($id);
    }

    public function updatePart(int $id, array $data): bool
    {
        return $this->partRepository->update($id, $data);
    }

    public function deletePart(int $id): bool
    {
        return $this->partRepository->delete($id);
    }

    public function createPartContent(string $name, array $data): bool
    {
        return $this->partContentRepository->create($name, $data);
    }

    public function getPartContent(int $id): bool
    {
        return $this->partContentRepository->get($id);
    }

    public function updatePartContent(int $id, array $data): bool
    {
        return $this->partContentRepository->update($id, $data);
    }

    public function deletePartContent(int $id): bool
    {
        return $this->partContentRepository->delete($id);
    }
}