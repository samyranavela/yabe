<?php

namespace App\Domain\Model\Entity;

use App\Domain\ValueObject\IdentityInterface;

/**
 * Class Setting
 *
 * @package App\Domain\Model\Entity
 */
final class Setting implements \IteratorAggregate
{

    /**
     * @var \App\Domain\ValueObject\IdentityInterface
     */
    private $id;

    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $value;

    /**
     * @var array
     */
    private $settings;

    /**
     * @var string
     */
    private $type = 'core';

    /**
     * @var \DateTime|null
     */
    private $createdAt;

    /**
     * @var \DateTime|null
     */
    private $updatedAt;

    /**
     * @var \App\Domain\Model\Entity\User
     */
    private $createdBy;

    /**
     * @var \App\Domain\Model\Entity\User
     */
    private $updatedBy;


    /**
     * Get id.
     *
     * @return \App\Domain\ValueObject\IdentityInterface
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id.
     *
     * @param \App\Domain\ValueObject\IdentityInterface $id
     *
     * @return Setting
     */
    public function setId(IdentityInterface $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set type.
     *
     * @param string $type
     *
     * @return Setting
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get createdAt.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set createdAt.
     *
     * @param \DateTime|null $createdAt
     *
     * @return Setting
     */
    public function setCreatedAt($createdAt = null)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get updatedAt.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set updatedAt.
     *
     * @param \DateTime|null $updatedAt
     *
     * @return Setting
     */
    public function setUpdatedAt($updatedAt = null)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get createdBy.
     *
     * @return \App\Domain\Model\Entity\User|null
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set createdBy.
     *
     * @param \App\Domain\Model\Entity\User|null $createdBy
     *
     * @return Setting
     */
    public function setCreatedBy(User $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get updatedBy.
     *
     * @return \App\Domain\Model\Entity\User|null
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Set updatedBy.
     *
     * @param \App\Domain\Model\Entity\User|null $updatedBy
     *
     * @return Setting
     */
    public function setUpdatedBy(User $updatedBy = null)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Set value.
     *
     * @param string $value
     *
     * @return Setting
     */
    public function setValue($value)
    {
        $this->value = $value;
        $this->settings = json_decode($value);

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->value ?: '';
    }

    /**
     * @param $name
     * @param $arguments
     *
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        if (property_exists($this->settings, $name)) {
            return $this->settings->{$name};
        }

        throw new \InvalidArgumentException(sprintf('"%s" not found in "%s"', $name, $this->getKey()));
    }

    /**
     * Get key.
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set key.
     *
     * @param string $key
     *
     * @return Setting
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * @return \ArrayIterator|\Traversable
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->settings);
    }
}
