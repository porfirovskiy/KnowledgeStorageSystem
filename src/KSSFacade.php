<?php
/**
 * Date: 18.04.20
 * Time: 18:35
 */

namespace KSS;

use KSS\Repositories\ProjectRepository;


class KSSFacade
{
    private $projectRepository;

    /**
     * KSSFacade constructor.
     * @param ProjectRepository $repository
     */
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function createProject(string $name, array $data): bool
    {
        return $this->projectRepository->create($name, $data);
    }
}