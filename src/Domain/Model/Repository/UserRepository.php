<?php

namespace App\Domain\Model\Repository;

use App\Domain\Model\Entity\User;
use App\Domain\ValueObject\IdentityInterface;

/**
 * Interface UserRepository
 *
 * @package App\Domain\Model\Repository
 */
interface UserRepository
{

    /**
     * @param int $limit
     * @param int $offset
     *
     * @return User[]
     */
    public function fetchAll(int $limit = 10, int $offset = 0): array;

    /**
     * @param \App\Domain\ValueObject\IdentityInterface $id
     *
     * @return \App\Domain\Model\Entity\User
     */
    public function fetchById(IdentityInterface $id): ?User;

    /**
     * @param string $slug
     *
     * @return \App\Domain\Model\Entity\User
     */
    public function fetchBySlug(string $slug): ?User;
}
