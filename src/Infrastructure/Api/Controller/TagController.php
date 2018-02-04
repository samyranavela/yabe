<?php

namespace App\Infrastructure\Api\Controller;

use App\Domain\Model\Repository\TagRepository;
use App\Domain\ValueObject\Identity;
use Ramsey\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TagController
 *
 * @package App\Infrastructure\Api\Controller
 */
class TagController extends Controller
{

    /**
     * @var \App\Domain\Model\Repository\TagRepository
     */
    private $tagRepository;

    /**
     * TagController constructor.
     *
     * @param \App\Domain\Model\Repository\TagRepository $tagRepository
     */
    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    /**
     * @Route("/tags", methods={"GET"}, name="tag_list")
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function listAction()
    {
        $tags = $this->tagRepository->fetchAll();

        return $this->json($tags);
    }

    /**
     * @Route("/tags/{id}", methods={"GET"}, name="tag_get_by_id")
     *
     * @param string $id
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getByIdAction(string $id)
    {
        $id = new Identity($id);
        $tag = $this->tagRepository->fetchById($id);

        return $this->json($tag);
    }

    /**
     * @Route("/tags/slug/{slug}", methods={"GET"}, name="tag_get_by_slug")
     *
     * @param string $slug
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getBySlugAction(string $slug)
    {
        $tag = $this->tagRepository->fetchBySlug($slug);

        return $this->json($tag);
    }

    /**
     * @Route("/tags", methods={"POST"}, name="tag_create")
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function createAction()
    {
        return $this->json([]);
    }

    /**
     * @Route("/tags/{id}", methods={"PUT"}, name="tag_update")
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
     * @Route("/tags/{id}", methods={"DELETE"}, name="tag_delete")
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