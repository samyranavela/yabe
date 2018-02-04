<?php

namespace App\Infrastructure\Api\Controller;

use App\Domain\Model\Repository\RoleRepository;
use Ramsey\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class RoleController
 *
 * @package App\Infrastructure\Api\Controller
 */
class RoleController extends Controller
{

    /**
     * @var \App\Domain\Model\Repository\RoleRepository
     */
    private $roleRepository;

    /**
     * RoleController constructor.
     *
     * @param \App\Domain\Model\Repository\RoleRepository $roleRepository
     */
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * @Route("/roles", methods={"GET"}, name="role_list")
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function listAction()
    {
        $roles = $this->roleRepository->fetchAll();

        return $this->json($roles);
    }

    /**
     * @Route("/roles/{id}", methods={"GET"}, name="role_get")
     *
     * @param string $id
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getAction(string $id)
    {
        $uuid = Uuid::fromString($id);
        $roles = $this->roleRepository->fetchById($uuid);

        return $this->json($roles);
    }

    /**
     * @Route("/roles", methods={"POST"}, name="role_create")
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function createAction()
    {
        return $this->json([]);
    }

    /**
     * @Route("/roles/{id}", methods={"PUT"}, name="role_update")
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
     * @Route("/roles/{id}", methods={"DELETE"}, name="role_delete")
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