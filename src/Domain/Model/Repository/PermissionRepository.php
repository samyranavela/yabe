<?php

namespace App\Domain\Model\Repository;

use App\Domain\Model\Entity\Permission;
use Ramsey\Uuid\UuidInterface;

/**
 * Interface PermissionRepository
 *
 * @package App\Domain\Model\Repository
 */
interface PermissionRepository
{

    /**
     * @param int $limit
     * @param int $offset
     *
     * @return Permission[]
     */
    public function fetchAll(int $limit = 10, int $offset = 0): array;

    /**
     * @param \Ramsey\Uuid\UuidInterface $id
     *
     * @return \App\Domain\Model\Entity\Permission
     */
    public function fetchById(UuidInterface $id): Permission;
}
