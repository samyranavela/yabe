<?php

namespace App\Infrastructure\Persistence\Memory\Repository;

use App\Domain\Model\Entity\Permission;
use App\Domain\Model\Repository\PermissionRepository;
use Ramsey\Uuid\UuidInterface;

/**
 * Class MemoryPermissionRepository
 *
 * @package App\Infrastructure\Persistence\Memory\Repository
 */
final class MemoryPermissionRepository implements PermissionRepository
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
    public function fetchById(UuidInterface $id): Permission
    {
        return new Permission();
    }
}