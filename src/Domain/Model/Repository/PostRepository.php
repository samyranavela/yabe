<?php

namespace App\Domain\Model\Repository;

use App\Domain\Model\Entity\Post;
use App\Domain\Model\Entity\Tag;
use Ramsey\Uuid\UuidInterface;

/**
 * Interface PostRepository
 *
 * @package App\Domain\Model\Repository
 */
interface PostRepository
{

    /**
     * @param int $limit
     * @param int $offset
     *
     * @return Post[]
     */
    public function fetchAll(int $limit = 10, int $offset = 0): array;

    /**
     * @param \Ramsey\Uuid\UuidInterface $id
     *
     * @return \App\Domain\Model\Entity\Post|null
     */
    public function fetchById(UuidInterface $id): ?Post;

    /**
     * @param string $slug
     *
     * @return \App\Domain\Model\Entity\Post|null
     */
    public function fetchBySlug(string $slug): ?Post;

    /**
     * @param \App\Domain\Model\Entity\Tag $tag
     *
     * @return \App\Domain\Model\Entity\Post[]
     */
    public function fetchByTag(Tag $tag);
}
