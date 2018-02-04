<?php

namespace App\Domain\Model\Entity;

use App\Domain\ValueObject\FeatureImage;
use App\Domain\ValueObject\IdentityInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Post
 *
 * @package App\Domain\Model\Entity
 */
final class Post
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
    private $mobileDoc;

    /**
     * @var string|null
     */
    private $html;

    /**
     * @var string|null
     */
    private $amp;

    /**
     * @var string|null
     */
    private $plaintext;

    /**
     * @var FeatureImage
     */
    private $featureImage;

    /**
     * @var bool
     */
    private $featured = 0;

    /**
     * @var bool
     */
    private $page = 0;

    /**
     * @var string
     */
    private $status = 'draft';

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
    private $excerpt;

    /**
     * @var string|null
     */
    private $codeInjectionHead;

    /**
     * @var string|null
     */
    private $codeInjectionFoot;

    /**
     * @var string|null
     */
    private $ogImage;

    /**
     * @var string|null
     */
    private $ogTitle;

    /**
     * @var string|null
     */
    private $ogDescription;

    /**
     * @var string|null
     */
    private $twitterImage;

    /**
     * @var string|null
     */
    private $twitterTitle;

    /**
     * @var string|null
     */
    private $twitterDescription;

    /**
     * @var string|null
     */
    private $customTemplate;

    /**
     * @var \DateTime|null
     */
    private $publishedAt;

    /**
     * @var \DateTime|null
     */
    private $createdAt;

    /**
     * @var \DateTime|null
     */
    private $updatedAt;

    /**
     * @var \DateTime|null
     */
    private $deletedAt;

    /**
     * @var \App\Domain\Model\Entity\User
     */
    private $publishedBy;

    /**
     * @var \App\Domain\Model\Entity\User
     */
    private $createdBy;

    /**
     * @var \App\Domain\Model\Entity\User
     */
    private $updatedBy;

    /**
     * @var \App\Domain\Model\Entity\User
     */
    private $deletedBy;

    /**
     * @var \App\Domain\Model\Entity\User
     */
    private $author;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tags;

    /**
     * @var \App\Domain\Model\Entity\Post
     */
    private $previous;

    /**
     * @var \App\Domain\Model\Entity\Post
     */
    private $next;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tags = new ArrayCollection();
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
     * Set id.
     *
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
     * @return Post
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get mobiledoc.
     *
     * @return string|null
     */
    public function getMobileDoc()
    {
        return $this->mobileDoc;
    }

    /**
     * Set mobiledoc.
     *
     * @param string|null $mobileDoc
     *
     * @return Post
     */
    public function setMobileDoc($mobileDoc = null)
    {
        $this->mobileDoc = $mobileDoc;

        return $this;
    }

    /**
     * Get amp.
     *
     * @return string|null
     */
    public function getAmp()
    {
        return $this->amp;
    }

    /**
     * Set amp.
     *
     * @param string|null $amp
     *
     * @return Post
     */
    public function setAmp($amp = null)
    {
        $this->amp = $amp;

        return $this;
    }

    /**
     * Get plaintext.
     *
     * @return string|null
     */
    public function getPlaintext()
    {
        return $this->plaintext;
    }

    /**
     * Set plaintext.
     *
     * @param string|null $plaintext
     *
     * @return Post
     */
    public function setPlaintext($plaintext = null)
    {
        $this->plaintext = $plaintext;

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
     * @return Post
     */
    public function setFeatureImage(FeatureImage $featureImage = null)
    {
        $this->featureImage = $featureImage;

        return $this;
    }

    /**
     * Get featured.
     *
     * @return bool
     */
    public function getFeatured()
    {
        return $this->featured;
    }

    /**
     * Set featured.
     *
     * @param bool $featured
     *
     * @return Post
     */
    public function setFeatured($featured)
    {
        $this->featured = $featured;

        return $this;
    }

    /**
     * Get page.
     *
     * @return bool
     */
    public function isPage(): bool
    {
        return (bool)$this->page;
    }

    /**
     * Set page.
     *
     * @param bool $page
     *
     * @return Post
     */
    public function setPage($page)
    {
        $this->page = $page;

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
     * @return Post
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
     * @return Post
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
     * @return Post
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
     * @return Post
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
     * @return Post
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
     * @return Post
     */
    public function setMetaDescription($metaDescription = null)
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }

    /**
     * Get excerpt.
     *
     * @param int    $width
     * @param string $ellipsis
     *
     * @return null|string
     */
    public function getExcerpt($width = 140, $ellipsis = '&hellip;')
    {
        if ($this->excerpt) {
            return $this->excerpt;
        }

        $text = explode('<hr />', wordwrap(strip_tags($this->getHtml()), $width, '<hr />'));

        return isset($text[0]) ? $text[0].' '.$ellipsis : null;
    }

    /**
     * Set customExcerpt.
     *
     * @param string|null $excerpt
     *
     * @return Post
     */
    public function setExcerpt($excerpt = null)
    {
        $this->excerpt = $excerpt;

        return $this;
    }

    /**
     * Get html.
     *
     * @return string|null
     */
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * Set html.
     *
     * @param string|null $html
     *
     * @return Post
     */
    public function setHtml($html = null)
    {
        $this->html = $html;

        return $this;
    }

    /**
     * Get codeInjectionHead.
     *
     * @return string|null
     */
    public function getCodeInjectionHead()
    {
        return $this->codeInjectionHead;
    }

    /**
     * Set codeInjectionHead.
     *
     * @param string|null $codeInjectionHead
     *
     * @return Post
     */
    public function setCodeInjectionHead($codeInjectionHead = null)
    {
        $this->codeInjectionHead = $codeInjectionHead;

        return $this;
    }

    /**
     * Get codeInjectionFoot.
     *
     * @return string|null
     */
    public function getCodeInjectionFoot()
    {
        return $this->codeInjectionFoot;
    }

    /**
     * Set codeInjectionFoot.
     *
     * @param string|null $codeInjectionFoot
     *
     * @return Post
     */
    public function setCodeInjectionFoot($codeInjectionFoot = null)
    {
        $this->codeInjectionFoot = $codeInjectionFoot;

        return $this;
    }

    /**
     * Get ogImage.
     *
     * @return string|null
     */
    public function getOgImage()
    {
        return $this->ogImage;
    }

    /**
     * Set ogImage.
     *
     * @param string|null $ogImage
     *
     * @return Post
     */
    public function setOgImage($ogImage = null)
    {
        $this->ogImage = $ogImage;

        return $this;
    }

    /**
     * Get ogTitle.
     *
     * @return string|null
     */
    public function getOgTitle()
    {
        return $this->ogTitle;
    }

    /**
     * Set ogTitle.
     *
     * @param string|null $ogTitle
     *
     * @return Post
     */
    public function setOgTitle($ogTitle = null)
    {
        $this->ogTitle = $ogTitle;

        return $this;
    }

    /**
     * Get ogDescription.
     *
     * @return string|null
     */
    public function getOgDescription()
    {
        return $this->ogDescription;
    }

    /**
     * Set ogDescription.
     *
     * @param string|null $ogDescription
     *
     * @return Post
     */
    public function setOgDescription($ogDescription = null)
    {
        $this->ogDescription = $ogDescription;

        return $this;
    }

    /**
     * Get twitterImage.
     *
     * @return string|null
     */
    public function getTwitterImage()
    {
        return $this->twitterImage;
    }

    /**
     * Set twitterImage.
     *
     * @param string|null $twitterImage
     *
     * @return Post
     */
    public function setTwitterImage($twitterImage = null)
    {
        $this->twitterImage = $twitterImage;

        return $this;
    }

    /**
     * Get twitterTitle.
     *
     * @return string|null
     */
    public function getTwitterTitle()
    {
        return $this->twitterTitle;
    }

    /**
     * Set twitterTitle.
     *
     * @param string|null $twitterTitle
     *
     * @return Post
     */
    public function setTwitterTitle($twitterTitle = null)
    {
        $this->twitterTitle = $twitterTitle;

        return $this;
    }

    /**
     * Get twitterDescription.
     *
     * @return string|null
     */
    public function getTwitterDescription()
    {
        return $this->twitterDescription;
    }

    /**
     * Set twitterDescription.
     *
     * @param string|null $twitterDescription
     *
     * @return Post
     */
    public function setTwitterDescription($twitterDescription = null)
    {
        $this->twitterDescription = $twitterDescription;

        return $this;
    }

    /**
     * Get customTemplate.
     *
     * @return string|null
     */
    public function getCustomTemplate()
    {
        return $this->customTemplate;
    }

    /**
     * Set customTemplate.
     *
     * @param string|null $customTemplate
     *
     * @return Post
     */
    public function setCustomTemplate($customTemplate = null)
    {
        $this->customTemplate = $customTemplate;

        return $this;
    }

    /**
     * Get publishedAt.
     *
     * @return \DateTime|null
     */
    public function getPublishedAt(): ?\DateTime
    {
        return $this->publishedAt;
    }

    /**
     * Set publishedAt.
     *
     * @param \DateTime|null $publishedAt
     *
     * @return Post
     */
    public function setPublishedAt(\DateTime $publishedAt = null)
    {
        $this->publishedAt = $publishedAt;

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
     * @return Post
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
     * @return Post
     */
    public function setUpdatedAt($updatedAt = null)
    {
        $this->updatedAt = $updatedAt;

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
     * @return Post
     */
    public function setDeletedAt($deletedAt = null)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get publishedBy.
     *
     * @return \App\Domain\Model\Entity\User|null
     */
    public function getPublishedBy()
    {
        return $this->publishedBy;
    }

    /**
     * Set publishedBy.
     *
     * @param \App\Domain\Model\Entity\User|null $publishedBy
     *
     * @return Post
     */
    public function setPublishedBy(User $publishedBy = null)
    {
        $this->publishedBy = $publishedBy;

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
     * @return Post
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
     * @return Post
     */
    public function setUpdatedBy(User $updatedBy = null)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get deletedBy.
     *
     * @return \App\Domain\Model\Entity\User|null
     */
    public function getDeletedBy()
    {
        return $this->deletedBy;
    }

    /**
     * Set deletedBy.
     *
     * @param \App\Domain\Model\Entity\User|null $deletedBy
     *
     * @return Post
     */
    public function setDeletedBy(User $deletedBy = null)
    {
        $this->deletedBy = $deletedBy;

        return $this;
    }

    /**
     * Get author.
     *
     * @return \App\Domain\Model\Entity\User|null
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set author.
     *
     * @param \App\Domain\Model\Entity\User|null $author
     *
     * @return Post
     */
    public function setAuthor(User $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Add tag.
     *
     * @param \App\Domain\Model\Entity\Tag $tag
     *
     * @return Post
     */
    public function addTag(Tag $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag.
     *
     * @param \App\Domain\Model\Entity\Tag $tag
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTag(Tag $tag)
    {
        return $this->tags->removeElement($tag);
    }

    /**
     * Get tags.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @return \App\Domain\Model\Entity\Tag
     */
    public function getPrimaryTag(): ?Tag
    {
        if ($this->tags->isEmpty()) {
            return null;
        }

        return $this->tags->get(0);
    }

    /**
     * @return \App\Domain\Model\Entity\Post
     */
    public function getPrevious(): ?Post
    {
        return $this->previous;
    }

    /**
     * @param \App\Domain\Model\Entity\Post $previous
     *
     * @return \App\Domain\Model\Entity\Post
     */
    public function setPrevious(Post $previous): Post
    {
        $this->previous = $previous;

        return $this;
    }

    /**
     * @return \App\Domain\Model\Entity\Post
     */
    public function getNext(): ?Post
    {
        return $this->next;
    }

    /**
     * @param \App\Domain\Model\Entity\Post $next
     *
     * @return \App\Domain\Model\Entity\Post
     */
    public function setNext(Post $next): Post
    {
        $this->next = $next;

        return $this;
    }
}
