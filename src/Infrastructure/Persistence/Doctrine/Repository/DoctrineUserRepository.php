<?php

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\Model\Entity\User;
use App\Domain\Model\Repository\UserRepository;
use App\Domain\ValueObject\IdentityInterface;
use Doctrine\ORM\EntityRepository;

/**
 * Class DoctrineUserRepository
 *
 * @package App\Infrastructure\Persistence\Doctrine\Repository
 */
final class DoctrineUserRepository extends EntityRepository implements UserRepository
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
    public function fetchById(IdentityInterface $id): ?User
    {
        return $this->findOneBy(['id' => $id->toString()]);
    }

    /**
     * {@inheritdoc}
     */
    public function fetchBySlug(string $slug): ?User
    {
        return $this->findOneBy(['slug' => $slug]);
    }
}