<?php

namespace App\Infrastructure\UI\Controller;

use App\Domain\Model\Repository\SettingRepository;
use App\Domain\Model\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AuthorController
 *
 * @package App\Infrastructure\UI\Controller
 */
class AuthorController extends Controller
{

    /**
     * @var \App\Domain\Model\Repository\UserRepository
     */
    private $userRepository;

    /**
     * @var \App\Domain\Model\Repository\SettingRepository
     */
    private $settingRepository;

    /**
     * AuthorController constructor.
     *
     * @param \App\Domain\Model\Repository\UserRepository    $userRepository
     * @param \App\Domain\Model\Repository\SettingRepository $settingRepository
     */
    public function __construct(UserRepository $userRepository, SettingRepository $settingRepository)
    {
        $this->userRepository = $userRepository;
        $this->settingRepository = $settingRepository;
    }

    /**
     * @Route("/author/{slug}", methods={"GET"}, name="author_index")
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param string                                    $slug
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request, string $slug)
    {
        $settings = $this->settingRepository->fetchByType('blog');
        $author = $this->userRepository->fetchBySlug($slug);

        if (!$author) {
            throw $this->createNotFoundException('Author not found.');
        }

        return $this->render(
          "author.html.twig",
          [
            'settings' => $settings,
            'subscribers' => 0,
            'author' => $author,
          ]
        );
    }
}