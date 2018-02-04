<?php

namespace App\Infrastructure\Persistence\Memory\Repository;

use App\Domain\Model\Entity\Post;
use App\Domain\Model\Entity\Tag;
use App\Domain\Model\Entity\User;
use App\Domain\Model\Repository\PostRepository;
use App\Domain\ValueObject\FeatureImage;
use App\Domain\ValueObject\Identity;
use Ramsey\Uuid\UuidInterface;

/**
 * Class MemoryPostRepository
 *
 * @package App\Infrastructure\Persistence\Memory\Repository
 */
final class MemoryPostRepository extends MemoryRepository implements PostRepository
{

    /**
     * {@inheritdoc}
     */
    public function fetchAll(int $limit = 10, int $offset = 0): array
    {
        $posts = [];
        $count = 0;
        foreach ($this->findFixtures() as $fixture) {
            if ($count >= $limit) {
                break;
            }

            $posts[] = $this->mapPost($fixture);

            $count++;
        }

        return $posts;
    }

    /**
     * @param array $fixture
     *
     * @return \App\Domain\Model\Entity\Post|null
     */
    protected function mapPost(array $fixture): ?Post
    {
        $post = new Post();
        $post->setId(new Identity($fixture['id']))
          ->setTitle($fixture['title'])
          ->setSlug($fixture['slug'])
          ->setHtml($fixture['html'])
          ->setPage($fixture['page']);

        if (isset($fixture['next'])) {
            $post->setNext($this->mapPost($fixture['next']));
        }
        if (isset($fixture['previous'])) {
            $post->setPrevious($this->mapPost($fixture['previous']));
        }

        $publishedAt = \DateTime::createFromFormat(self::DATE_FORMAT, $fixture['publishedAt']);
        if ($publishedAt) {
            $post->setPublishedAt($publishedAt);
        }

        $featureImage = new FeatureImage();
        $featureImage->setUrl($fixture['featureImage']);
        $post->setFeatureImage($featureImage);

        if (isset($fixture['tags']) && is_array($fixture['tags'])) {
            foreach ($fixture['tags'] as $tagFixture) {
                $tag = new Tag();
                $tag->setId(new Identity($tagFixture['id']))
                  ->setTitle($tagFixture['title'])
                  ->setSlug($tagFixture['slug']);

                if (isset($tagFixture['posts']) && is_array($tagFixture['posts'])) {
                    foreach ($tagFixture['posts'] as $postFixture) {
                        $tagPost = new Post();
                        $tagPost->setId(new Identity($postFixture['id']))
                          ->setTitle($postFixture['title'])
                          ->setSlug($postFixture['slug']);

                        $tag->addPost($tagPost);
                    }
                }


                $post->addTag($tag);
            }
        }

        if (isset($fixture['author']['id'])) {
            $user = new User();
            $user->setId(new Identity($fixture['author']['id']))
              ->setName($fixture['author']['name'])
              ->setSlug($fixture['author']['slug'])
              ->setBio($fixture['author']['bio'])
              ->setCoverImage($fixture['author']['coverImage'])
              ->setProfileImage($fixture['author']['profileImage'])
              ->setName($fixture['author']['name'])
              ->setWebsite($fixture['author']['website'])
              ->setFacebook($fixture['author']['facebook'])
              ->setTwitter($fixture['author']['twitter']);

            $post->setAuthor($user);
        }

        return $post;
    }

    /**
     * {@inheritdoc}
     */
    public function fetchById(UuidInterface $id): ?Post
    {
        foreach ($this->findByName($id) as $fixture) {
            return $this->mapPost($fixture);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function fetchBySlug(string $slug): ?Post
    {
        foreach ($this->findByContent("slug: $slug") as $fixture) {
            return $this->mapPost($fixture);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function fetchByTag(Tag $tag)
    {
        return [];
    }
}