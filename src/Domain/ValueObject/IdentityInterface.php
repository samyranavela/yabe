<?php

namespace App\Domain\ValueObject;

/**
 * Interface IdentityInterface
 *
 * @package App\Domain\ValueObject
 */
interface IdentityInterface
{

    /**
     * @return \App\Domain\ValueObject\IdentityInterface
     */
    public static function getNextIdentity(): IdentityInterface;

    /**
     * @param \App\Domain\ValueObject\IdentityInterface $identity
     *
     * @return bool
     */
    public function equals(IdentityInterface $identity): bool;

    /**
     * @return string
     */
    public function __toString(): string;
}