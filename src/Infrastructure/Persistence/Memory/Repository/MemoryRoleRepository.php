<?php

namespace App\Infrastructure\Persistence\Memory\Repository;

use App\Domain\Model\Entity\Role;
use App\Domain\Model\Repository\RoleRepository;
use Ramsey\Uuid\UuidInterface;

/**
 * Class MemoryRoleRepository
 *
 * @package App\Infrastructure\Persistence\Memory\Repository
 */
final class MemoryRoleRepository implements RoleRepository
{

    /**
     * {@inheritdoc}
     */
    public function fetchAll(int $limit = 10, int $offset = 0): array
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function fetchById(UuidInterface $id): Role
    {
        return new Role();
    }
}