<?php

namespace App\Infrastructure\Persistence\Memory\Repository;

use App\Domain\Model\Entity\Post;
use App\Domain\Model\Entity\Tag;
use App\Domain\Model\Entity\User;
use App\Domain\Model\Repository\UserRepository;
use App\Domain\ValueObject\FeatureImage;
use App\Domain\ValueObject\Identity;
use App\Domain\ValueObject\IdentityInterface;

/**
 * Class MemoryUserRepository
 *
 * @package App\Infrastructure\Persistence\Memory\Repository
 */
final class MemoryUserRepository extends MemoryRepository implements UserRepository
{

    /**
     * {@inheritdoc}
     */
    public function fetchAll(int $limit = 10, int $offset = 0): array
    {
        $users = [];
        foreach ($this->findFixtures() as $fixture) {
            $users[] = $this->mapUser($fixture);
        }

        return $users;
    }

    /**
     * @param array $fixture
     *
     * @return \App\Domain\Model\Entity\User
     */
    protected function mapUser(array $fixture): User
    {
        $user = new User();
        $user->setId(new Identity($fixture['id']))
          ->setName($fixture['name'])
          ->setSlug($fixture['slug'])
          ->setBio($fixture['bio'])
          ->setCoverImage($fixture['coverImage'])
          ->setProfileImage($fixture['profileImage'])
          ->setName($fixture['name'])
          ->setWebsite($fixture['website'])
          ->setFacebook($fixture['facebook'])
          ->setTwitter($fixture['twitter']);

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
                    $postUser = new User();
                    $postUser->setId(new Identity($postFixture['author']['id']))
                      ->setName($postFixture['author']['name'])
                      ->setSlug($postFixture['author']['slug'])
                      ->setBio($postFixture['author']['bio'])
                      ->setCoverImage($postFixture['author']['coverImage'])
                      ->setProfileImage($postFixture['author']['profileImage'])
                      ->setName($postFixture['author']['name'])
                      ->setWebsite($postFixture['author']['website'])
                      ->setFacebook($postFixture['author']['facebook'])
                      ->setTwitter($postFixture['author']['twitter']);

                    $post->setAuthor($postUser);
                }

                $user->addPost($post);
            }
        }

        return $user;
    }

    /**
     * {@inheritdoc}
     */
    public function fetchById(IdentityInterface $id): ?User
    {
        foreach ($this->findByName($id) as $fixture) {
            return $this->mapUser($fixture);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function fetchBySlug(string $slug): ?User
    {
        foreach ($this->findByContent("slug: $slug") as $fixture) {
            return $this->mapUser($fixture);
        }
    }
}