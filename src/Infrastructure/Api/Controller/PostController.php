<?php

namespace App\Infrastructure\Api\Controller;

use App\Domain\Model\Repository\PostRepository;
use Ramsey\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PostController
 *
 * @package App\Infrastructure\Api\Controller
 */
class PostController extends Controller
{

    /**
     * @var \App\Domain\Model\Repository\PostRepository
     */
    private $postRepository;

    /**
     * PostController constructor.
     *
     * @param \App\Domain\Model\Repository\PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @Route("/posts", methods={"GET"}, name="post_list")
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function listAction()
    {
        $posts = $this->postRepository->fetchAll();

        return $this->json($posts);
    }

    /**
     * @Route("/posts/{id}", methods={"GET"}, name="post_get_by_id")
     *
     * @param string $id
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getByIdAction(string $id)
    {
        $uuid = Uuid::fromString($id);
        $post = $this->postRepository->fetchById($uuid);

        return $this->json($post);
    }

    /**
     * @Route("/posts/slug/{slug}", methods={"GET"}, name="post_get_by_slug")
     *
     * @param string $slug
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getBySlugAction(string $slug)
    {
        $post = $this->postRepository->fetchBySlug($slug);

        return $this->json($post);
    }

    /**
     * @Route("/posts", methods={"POST"}, name="post_create")
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function createAction()
    {
        return $this->json([]);
    }

    /**
     * @Route("/posts/{id}", methods={"PUT"}, name="post_update")
     *
     * @param string $id
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function updateAction(string $id)
    {
        $uuid = Uuid::fromString($id);

        return $this->json([]);
    }

    /**
     * @Route("/posts/{id}", methods={"DELETE"}, name="post_delete")
     *
     * @param string $id
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function deleteAction(string $id)
    {
        $uuid = Uuid::fromString($id);

        return $this->json([]);
    }
}