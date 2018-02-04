<?php

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\Model\Entity\Post;
use App\Domain\Model\Entity\Tag;
use App\Domain\Model\Repository\PostRepository;
use Doctrine\ORM\EntityRepository;
use Ramsey\Uuid\UuidInterface;

/**
 * Class DoctrinePostRepository
 *
 * @package App\Infrastructure\Persistence\Doctrine\Repository
 */
final class DoctrinePostRepository extends EntityRepository implements PostRepository
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
    public function fetchById(UuidInterface $id): Post
    {
        return $this->findOneBy(['id' => $id->toString()]);
    }

    /**
     * {@inheritdoc}
     */
    public function fetchBySlug(string $slug): Post
    {
        return $this->findOneBy(['slug' => $slug]);
    }

    /**
     * {@inheritdoc}
     */
    public function fetchByTag(Tag $tag)
    {
        return [];
    }
}