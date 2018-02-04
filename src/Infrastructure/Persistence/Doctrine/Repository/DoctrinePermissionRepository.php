<?php

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\Model\Entity\Permission;
use App\Domain\Model\Repository\PermissionRepository;
use Doctrine\ORM\EntityRepository;
use Ramsey\Uuid\UuidInterface;

/**
 * Class DoctrinePermissionRepository
 *
 * @package App\Infrastructure\Persistence\Doctrine\Repository
 */
final class DoctrinePermissionRepository extends EntityRepository implements PermissionRepository
{

    /**
     * {@inheritdoc}
     */
    public function fetchAll(int $limit = 10, int $offset = 0): array
    {
        return $this->findAll();
    }

    /**
     * {@inheritdoc}
     */
    public function fetchById(UuidInterface $id): Permission
    {
        return $this->findOneBy(['id' => $id->toString()]);
    }
}