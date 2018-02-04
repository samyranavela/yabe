<?php

namespace App\Domain\Model\Entity;

/**
 * Class Permission
 *
 * @package App\Domain\Model\Entity
 */
final class Permission
{

    /**
     * @var \App\Domain\ValueObject\IdentityInterface
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $objectType;

    /**
     * @var string
     */
    private $actionType;

    /**
     * @var string
     */
    private $objectId;

    /**
     * @var \DateTime|null
     */
    private $createdAt;

    /**
     * @var \App\Domain\ValueObject\IdentityInterface
     */
    private $createdBy;

    /**
     * @var \DateTime|null
     */
    private $updatedAt;

    /**
     * @var \App\Domain\ValueObject\IdentityInterface
     */
    private $updatedBy;

    /**
     * @var \DateTime|null
     */
    private $deletedAt;

    /**
     * @var \App\Domain\ValueObject\IdentityInterface
     */
    private $deletedBy;


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
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Permission
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get objectType.
     *
     * @return string
     */
    public function getObjectType()
    {
        return $this->objectType;
    }

    /**
     * Set objectType.
     *
     * @param string $objectType
     *
     * @return Permission
     */
    public function setObjectType($objectType)
    {
        $this->objectType = $objectType;

        return $this;
    }

    /**
     * Get actionType.
     *
     * @return string
     */
    public function getActionType()
    {
        return $this->actionType;
    }

    /**
     * Set actionType.
     *
     * @param string $actionType
     *
     * @return Permission
     */
    public function setActionType($actionType)
    {
        $this->actionType = $actionType;

        return $this;
    }

    /**
     * Get objectId.
     *
     * @return string
     */
    public function getObjectId()
    {
        return $this->objectId;
    }

    /**
     * Set objectId.
     *
     * @param string $objectId
     *
     * @return Permission
     */
    public function setObjectId($objectId)
    {
        $this->objectId = $objectId;

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
     * @return Permission
     */
    public function setCreatedAt($createdAt = null)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdBy.
     *
     * @return \App\Domain\ValueObject\IdentityInterface
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set createdBy.
     *
     * @param \App\Domain\ValueObject\IdentityInterface $createdBy
     *
     * @return Permission
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

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
     * @return Permission
     */
    public function setUpdatedAt($updatedAt = null)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedBy.
     *
     * @return \App\Domain\ValueObject\IdentityInterface
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Set updatedBy.
     *
     * @param \App\Domain\ValueObject\IdentityInterface $updatedBy
     *
     * @return Permission
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get deletedAt.
     *
     * @return \DateTime|null
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * Set deletedAt.
     *
     * @param \DateTime|null $deletedAt
     *
     * @return Permission
     */
    public function setDeletedAt($deletedAt = null)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedBy.
     *
     * @return \App\Domain\ValueObject\IdentityInterface
     */
    public function getDeletedBy()
    {
        return $this->deletedBy;
    }

    /**
     * Set deletedBy.
     *
     * @param \App\Domain\ValueObject\IdentityInterface $deletedBy
     *
     * @return Permission
     */
    public function setDeletedBy($deletedBy)
    {
        $this->deletedBy = $deletedBy;

        return $this;
    }
}
