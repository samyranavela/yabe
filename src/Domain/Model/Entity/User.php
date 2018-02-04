<?php

namespace App\Domain\Model\Entity;

use App\Domain\ValueObject\IdentityInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class User
 *
 * @package App\Domain\Model\Entity
 */
final class User
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
    private $slug;

    /**
     * @var string|null
     */
    private $authAccessToken;

    /**
     * @var string|null
     */
    private $authId;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string|null
     */
    private $email;

    /**
     * @var string|null
     */
    private $profileImage;

    /**
     * @var string|null
     */
    private $coverImage;

    /**
     * @var string|null
     */
    private $bio;

    /**
     * @var string|null
     */
    private $website;

    /**
     * @var string|null
     */
    private $location;

    /**
     * @var string|null
     */
    private $facebook;

    /**
     * @var string|null
     */
    private $twitter;

    /**
     * @var string|null
     */
    private $accessibility;

    /**
     * @var string
     */
    private $status = 'active';

    /**
     * @var string|null
     */
    private $locale;

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
     * @var string|null
     */
    private $tour;

    /**
     * @var \DateTime|null
     */
    private $lastSeen;

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
    private $posts;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $roles;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $permissions;

    /**
     * @var int
     */
    private $postsNumber;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->posts = new ArrayCollection();
        $this->roles = new ArrayCollection();
        $this->permissions = new ArrayCollection();
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
     * @return $this
     */
    public function setId(IdentityInterface $id)
    {
        $this->id = $id;

        return $this;
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
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

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
     * @return User
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get authAccessToken.
     *
     * @return string|null
     */
    public function getAuthAccessToken()
    {
        return $this->authAccessToken;
    }

    /**
     * Set authAccessToken.
     *
     * @param string|null $authAccessToken
     *
     * @return User
     */
    public function setAuthAccessToken($authAccessToken = null)
    {
        $this->authAccessToken = $authAccessToken;

        return $this;
    }

    /**
     * Get authId.
     *
     * @return string|null
     */
    public function getAuthId()
    {
        return $this->authId;
    }

    /**
     * Set authId.
     *
     * @param string|null $authId
     *
     * @return User
     */
    public function setAuthId($authId = null)
    {
        $this->authId = $authId;

        return $this;
    }

    /**
     * Get password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set password.
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set email.
     *
     * @param string|null $email
     *
     * @return User
     */
    public function setEmail($email = null)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get profileImage.
     *
     * @return string|null
     */
    public function getProfileImage()
    {
        return $this->profileImage;
    }

    /**
     * Set profileImage.
     *
     * @param string|null $profileImage
     *
     * @return User
     */
    public function setProfileImage($profileImage = null)
    {
        $this->profileImage = $profileImage;

        return $this;
    }

    /**
     * Get coverImage.
     *
     * @return string|null
     */
    public function getCoverImage()
    {
        return $this->coverImage;
    }

    /**
     * Set coverImage.
     *
     * @param string|null $coverImage
     *
     * @return User
     */
    public function setCoverImage($coverImage = null)
    {
        $this->coverImage = $coverImage;

        return $this;
    }

    /**
     * Get bio.
     *
     * @return string|null
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * Set bio.
     *
     * @param string|null $bio
     *
     * @return User
     */
    public function setBio($bio = null)
    {
        $this->bio = $bio;

        return $this;
    }

    /**
     * Get website.
     *
     * @return string|null
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set website.
     *
     * @param string|null $website
     *
     * @return User
     */
    public function setWebsite($website = null)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get location.
     *
     * @return string|null
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set location.
     *
     * @param string|null $location
     *
     * @return User
     */
    public function setLocation($location = null)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get facebook.
     *
     * @return string|null
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set facebook.
     *
     * @param string|null $facebook
     *
     * @return User
     */
    public function setFacebook($facebook = null)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get twitter.
     *
     * @return string|null
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set twitter.
     *
     * @param string|null $twitter
     *
     * @return User
     */
    public function setTwitter($twitter = null)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Get accessibility.
     *
     * @return string|null
     */
    public function getAccessibility()
    {
        return $this->accessibility;
    }

    /**
     * Set accessibility.
     *
     * @param string|null $accessibility
     *
     * @return User
     */
    public function setAccessibility($accessibility = null)
    {
        $this->accessibility = $accessibility;

        return $this;
    }

    /**
     * Get status.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set status.
     *
     * @param string $status
     *
     * @return User
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get locale.
     *
     * @return string|null
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set locale.
     *
     * @param string|null $locale
     *
     * @return User
     */
    public function setLocale($locale = null)
    {
        $this->locale = $locale;

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
     * @return User
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
        return $this->metaTitle;
    }

    /**
     * Set metaTitle.
     *
     * @param string|null $metaTitle
     *
     * @return User
     */
    public function setMetaTitle($metaTitle = null)
    {
        $this->metaTitle = $metaTitle;

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
     * @return User
     */
    public function setMetaDescription($metaDescription = null)
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }

    /**
     * Get tour.
     *
     * @return string|null
     */
    public function getTour()
    {
        return $this->tour;
    }

    /**
     * Set tour.
     *
     * @param string|null $tour
     *
     * @return User
     */
    public function setTour($tour = null)
    {
        $this->tour = $tour;

        return $this;
    }

    /**
     * Get lastSeen.
     *
     * @return \DateTime|null
     */
    public function getLastSeen()
    {
        return $this->lastSeen;
    }

    /**
     * Set lastSeen.
     *
     * @param \DateTime|null $lastSeen
     *
     * @return User
     */
    public function setLastSeen($lastSeen = null)
    {
        $this->lastSeen = $lastSeen;

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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
     */
    public function setDeletedBy($deletedBy)
    {
        $this->deletedBy = $deletedBy;

        return $this;
    }

    /**
     * Add post.
     *
     * @param \App\Domain\Model\Entity\Post $post
     *
     * @return User
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

    /**
     * Add role.
     *
     * @param \App\Domain\Model\Entity\Role $role
     *
     * @return User
     */
    public function addRole(Role $role)
    {
        $this->roles[] = $role;

        return $this;
    }

    /**
     * Remove role.
     *
     * @param \App\Domain\Model\Entity\Role $role
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeRole(Role $role)
    {
        return $this->roles->removeElement($role);
    }

    /**
     * Get roles.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Add permission.
     *
     * @param \App\Domain\Model\Entity\Permission $permission
     *
     * @return User
     */
    public function addPermission(Permission $permission)
    {
        $this->permissions[] = $permission;

        return $this;
    }

    /**
     * Remove permission.
     *
     * @param \App\Domain\Model\Entity\Permission $permission
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removePermission(Permission $permission)
    {
        return $this->permissions->removeElement($permission);
    }

    /**
     * Get permissions.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * @return int
     */
    public function getPostsNumber(): int
    {
        return $this->postsNumber ?: 0;
    }

    /**
     * @param int $postsNumber
     */
    public function setPostsNumber(int $postsNumber): void
    {
        $this->postsNumber = $postsNumber;
    }
}
