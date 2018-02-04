<?php

namespace App\Domain\ValueObject;

use Assert\Assertion;
use Ramsey\Uuid\Uuid;

/**
 * Class Identity
 *
 * @package App\Domain\ValueObject
 */
class Identity implements IdentityInterface
{

    /**
     * @var \Ramsey\Uuid\UuidInterface
     */
    private $identity;

    /**
     * Identity constructor.
     *
     * @param string $identity
     */
    public function __construct(string $identity)
    {
        $this->identity = Uuid::fromString($identity);
    }

    /**
     * {@inheritdoc}
     */
    public static function getNextIdentity(): IdentityInterface
    {
        return new self(Uuid::uuid4());
    }

    /**
     * {@inheritdoc}
     */
    public function equals(IdentityInterface $identity): bool
    {
        return Assertion::same($this->identity, (string)$identity);
    }

    /**
     * {@inheritdoc}
     */
    public function __toString(): string
    {
        return $this->identity->toString();
    }
}