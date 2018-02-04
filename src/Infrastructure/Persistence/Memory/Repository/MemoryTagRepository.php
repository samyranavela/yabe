<?php

namespace App\Infrastructure\Persistence\Memory\Repository;

use App\Domain\Model\Entity\Post;
use App\Domain\Model\Entity\Tag;
use App\Domain\Model\Entity\User;
use App\Domain\Model\Repository\TagRepository;
use App\Domain\ValueObject\FeatureImage;
use App\Domain\ValueObject\Identity;
use App\Domain\ValueObject\IdentityInterface;

/**
 * Class MemoryTagRepository
 *
 * @package App\Infrastructure\Persistence\Memory\Repository
 */
final class MemoryTagRepository extends MemoryRepository implements TagRepository
{

    /**
     * {@inheritdoc}
     */
    public function fetchAll(int $limit = 10, int $offset = 0): array
    {
        $tags = [];
        foreach ($this->findFixtures() as $fixture) {
            $tags[] = $this->mapTag($fixture);
        }

        return $tags;
    }

    /**
     * @param array $fixture
     *
     * @return \App\Domain\Model\Entity\Tag
     */
    protected function mapTag(array $fixture): Tag
    {
        $tag = new Tag();
        $tag->setId(new Identity($fixture['id']))
          ->setTitle($fixture['title'])
          ->setSlug($fixture['slug']);

        if (isset($fixture['posts']) && is_array($fixture['posts'])) {
            foreach ($fixture['posts'] as $postFixture) {
                $post = new Post();
                $post->setId(new Identity($postFixture['id']))
                  ->setTitle($postFixture['title'])
                  ->setSlug($postFixture['slug'])
                  ->setPublishedAt(\DateTime::createFromFormat(self::DATE_FORMAT, $postFixture['publishedAt']))
                  ->setHtml($postFixture['html']);

                $featureImage = new FeatureImage();
                $featureImage->setUrl($postFixture['featureImage']);
                $post->setFeatureImage($featureImage);

                if (isset($postFixture['tags']) && is_array($postFixture['tags'])) {
                    foreach ($postFixture['tags'] as $tagFixture) {
                        $postTag = new Tag();
                        $postTag->setId(new Identity($tagFixture['id']))
                          ->setTitle($tagFixture['title'])
                          ->setSlug($tagFixture['slug']);

                        $post->addTag($postTag);
                    }
                }

                if (isset($postFixture['author']['id'])) {
                    $user = new User();
                    $user->setId(new Identity($postFixture['author']['id']))
                      ->setName($postFixture['author']['name'])
                      ->setSlug($postFixture['author']['slug'])
                      ->setBio($postFixture['author']['bio'])
                      ->setCoverImage($postFixture['author']['coverImage'])
                      ->setProfileImage($postFixture['author']['profileImage'])
                      ->setName($postFixture['author']['name'])
                      ->setWebsite($postFixture['author']['website'])
                      ->setFacebook($postFixture['author']['facebook'])
                      ->setTwitter($postFixture['author']['twitter']);

                    $post->setAuthor($user);
                }

                $tag->addPost($post);
            }
        }

        return $tag;
    }

    /**
     * {@inheritdoc}
     */
    public function fetchById(IdentityInterface $id): ?Tag
    {
        foreach ($this->findByName($id) as $fixture) {
            return $this->mapTag($fixture);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function fetchBySlug(string $slug): ?Tag
    {
        foreach ($this->findByContent("slug: $slug") as $fixture) {
            return $this->mapTag($fixture);
        }
    }
}