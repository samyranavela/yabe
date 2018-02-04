<?php

namespace App\Infrastructure\Api\Controller;

use App\Domain\Model\Repository\PermissionRepository;
use Ramsey\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PermissionController
 *
 * @package App\Infrastructure\Api\Controller
 */
class PermissionController extends Controller
{

    /**
     * @var \App\Domain\Model\Repository\PermissionRepository
     */
    private $permissionRepository;

    /**
     * PermissionController constructor.
     *
     * @param \App\Domain\Model\Repository\PermissionRepository $permissionRepository
     */
    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * @Route("/permissions", methods={"GET"}, name="permission_list")
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function listAction()
    {
        $permissions = $this->permissionRepository->fetchAll();

        return $this->json($permissions);
    }

    /**
     * @Route("/permissions/{id}", methods={"GET"}, name="permission_get")
     *
     * @param string $id
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getAction(string $id)
    {
        $uuid = Uuid::fromString($id);
        $permissions = $this->permissionRepository->fetchById($uuid);

        return $this->json($permissions);
    }

    /**
     * @Route("/permissions", methods={"POST"}, name="permission_create")
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function createAction()
    {
        return $this->json([]);
    }

    /**
     * @Route("/permissions/{id}", methods={"PUT"}, name="permission_update")
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
     * @Route("/permissions/{id}", methods={"DELETE"}, name="permission_delete")
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