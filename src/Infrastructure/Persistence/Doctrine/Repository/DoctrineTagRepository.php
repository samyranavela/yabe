<?php

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\Model\Entity\Tag;
use App\Domain\Model\Repository\TagRepository;
use App\Domain\ValueObject\IdentityInterface;
use Doctrine\ORM\EntityRepository;

/**
 * Class DoctrineTagRepository
 *
 * @package App\Infrastructure\Persistence\Doctrine\Repository
 */
final class DoctrineTagRepository extends EntityRepository implements TagRepository
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
    public function fetchById(IdentityInterface $id): ?Tag
    {
        return $this->findOneBy(['id' => $id->toString()]);
    }

    /**
     * {@inheritdoc}
     */
    public function fetchBySlug(string $slug): ?Tag
    {
        return $this->findOneBy(['slug' => $slug]);
    }
}