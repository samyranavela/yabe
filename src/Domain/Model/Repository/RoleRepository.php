<?php

namespace App\Domain\Model\Repository;

use App\Domain\Model\Entity\Role;
use Ramsey\Uuid\UuidInterface;

/**
 * Interface RoleRepository
 *
 * @package App\Domain\Model\Repository
 */
interface RoleRepository
{

    /**
     * @param int $limit
     * @param int $offset
     *
     * @return Role[]
     */
    public function fetchAll(int $limit = 10, int $offset = 0): array;

    /**
     * @param \Ramsey\Uuid\UuidInterface $id
     *
     * @return \App\Domain\Model\Entity\Role
     */
    public function fetchById(UuidInterface $id): Role;
}
