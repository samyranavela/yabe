<?php

namespace App\Infrastructure\Api\Controller;

use App\Domain\Model\Repository\UserRepository;
use App\Domain\ValueObject\Identity;
use Ramsey\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserController
 *
 * @package App\Infrastructure\Api\Controller
 */
class UserController extends Controller
{

    /**
     * @var \App\Domain\Model\Repository\UserRepository
     */
    private $userRepository;

    /**
     * UserController constructor.
     *
     * @param \App\Domain\Model\Repository\UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @Route("/users", methods={"GET"}, name="user_list")
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function listAction()
    {
        $users = $this->userRepository->fetchAll();

        return $this->json($users);
    }

    /**
     * @Route("/users/{id}", methods={"GET"}, name="user_get_by_id")
     *
     * @param string $id
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getByIdAction(string $id)
    {
        $uuid = new Identity($id);
        $user = $this->userRepository->fetchById($uuid);

        return $this->json($user);
    }

    /**
     * @Route("/users/slug/{slug}", methods={"GET"}, name="user_get_by_slug")
     *
     * @param string $slug
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getBySlugAction(string $slug)
    {
        $user = $this->userRepository->fetchBySlug($slug);

        return $this->json($user);
    }

    /**
     * @Route("/users", methods={"POST"}, name="user_create")
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function createAction()
    {
        return $this->json([]);
    }

    /**
     * @Route("/users/{id}", methods={"PUT"}, name="user_update")
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
     * @Route("/users/{id}", methods={"DELETE"}, name="user_delete")
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