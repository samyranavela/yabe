<?php

namespace App\Domain\Model\Entity;

use App\Domain\ValueObject\FeatureImage;
use App\Domain\ValueObject\IdentityInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Tag
 *
 * @package App\Domain\Model\Entity
 */
final class Tag
{

    /**
     * @var \App\Domain\ValueObject\IdentityInterface
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var \App\Domain\ValueObject\FeatureImage
     */
    private $featureImage;

    /**
     * @var string
     */
    private $visibility = 'public';

    /**
     * @var string|null
     */
    private $metaTitle;

    /**
     * @var string|null
     */
    private $metaDescription;

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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $children;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $parent;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $posts;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new ArrayCollection();
        $this->parent = new ArrayCollection();
        $this->posts = new ArrayCollection();
    }

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
     * @param \App\Domain\ValueObject\IdentityInterface $id
     *
     * @return \App\Domain\Model\Entity\Tag
     */
    public function setId(IdentityInterface $id): Tag
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set slug.
     *
     * @param string $slug
     *
     * @return Tag
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set description.
     *
     * @param string|null $description
     *
     * @return Tag
     */
    public function setDescription($description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get featureImage.
     *
     * @return \App\Domain\ValueObject\FeatureImage
     */
    public function getFeatureImage()
    {
        return $this->featureImage;
    }

    /**
     * Set featureImage.
     *
     * @param FeatureImage $featureImage
     *
     * @return Tag
     */
    public function setFeatureImage(FeatureImage $featureImage = null)
    {
        $this->featureImage = $featureImage;

        return $this;
    }

    /**
     * Get visibility.
     *
     * @return string
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * Set visibility.
     *
     * @param string $visibility
     *
     * @return Tag
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;

        return $this;
    }

    /**
     * Get metaTitle.
     *
     * @return string|null
     */
    public function getMetaTitle()
    {
        return $this->metaTitle ?: $this->getTitle();
    }

    /**
     * Set metaTitle.
     *
     * @param string|null $metaTitle
     *
     * @return Tag
     */
    public function setMetaTitle($metaTitle = null)
    {
        $this->metaTitle = $metaTitle;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Tag
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get metaDescription.
     *
     * @return string|null
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * Set metaDescription.
     *
     * @param string|null $metaDescription
     *
     * @return Tag
     */
    public function setMetaDescription($metaDescription = null)
    {
        $this->metaDescription = $metaDescription;

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
     * @return Tag
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
     * @return Tag
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
     * @return Tag
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
     * @return Tag
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
     * @return Tag
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
     * @return Tag
     */
    public function setDeletedBy($deletedBy)
    {
        $this->deletedBy = $deletedBy;

        return $this;
    }

    /**
     * Add child.
     *
     * @param \App\Domain\Model\Entity\Tag $child
     *
     * @return Tag
     */
    public function addChild(Tag $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child.
     *
     * @param \App\Domain\Model\Entity\Tag $child
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeChild(Tag $child)
    {
        return $this->children->removeElement($child);
    }

    /**
     * Get children.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Add parent.
     *
     * @param \App\Domain\Model\Entity\Tag $parent
     *
     * @return Tag
     */
    public function addParent(Tag $parent)
    {
        $this->parent[] = $parent;

        return $this;
    }

    /**
     * Remove parent.
     *
     * @param \App\Domain\Model\Entity\Tag $parent
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeParent(Tag $parent)
    {
        return $this->parent->removeElement($parent);
    }

    /**
     * Get parent.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add post.
     *
     * @param \App\Domain\Model\Entity\Post $post
     *
     * @return Tag
     */
    public function addPost(Post $post)
    {
        $this->posts[] = $post;

        return $this;
    }

    /**
     * Remove post.
     *
     * @param \App\Domain\Model\Entity\Post $post
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removePost(Post $post)
    {
        return $this->posts->removeElement($post);
    }

    /**
     * Get posts.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPosts()
    {
        return $this->posts;
    }
}
