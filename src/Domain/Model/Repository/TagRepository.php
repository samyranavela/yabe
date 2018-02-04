<?php

namespace App\Domain\Model\Repository;

use App\Domain\Model\Entity\Tag;
use App\Domain\ValueObject\IdentityInterface;

/**
 * Interface TagRepository
 *
 * @package App\Domain\Model\Repository
 */
interface TagRepository
{

    /**
     * @param int $limit
     * @param int $offset
     *
     * @return Tag[]
     */
    public function fetchAll(int $limit = 10, int $offset = 0): array;

    /**
     * @param \App\Domain\ValueObject\IdentityInterface $id
     *
     * @return \App\Domain\Model\Entity\Tag
     */
    public function fetchById(IdentityInterface $id): ?Tag;

    /**
     * @param string $slug
     *
     * @return \App\Domain\Model\Entity\Tag
     */
    public function fetchBySlug(string $slug): ?Tag;
}
