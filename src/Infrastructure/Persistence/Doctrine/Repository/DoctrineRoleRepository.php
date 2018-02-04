<?php

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\Model\Entity\Role;
use App\Domain\Model\Repository\RoleRepository;
use Doctrine\ORM\EntityRepository;
use Ramsey\Uuid\UuidInterface;

/**
 * Class DoctrineRoleRepository
 *
 * @package App\Infrastructure\Persistence\Doctrine\Repository
 */
final class DoctrineRoleRepository extends EntityRepository implements RoleRepository
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
    public function fetchById(UuidInterface $id): Role
    {
        return $this->findOneBy(['id' => $id->toString()]);
    }
}