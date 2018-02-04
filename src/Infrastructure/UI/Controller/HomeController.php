<?php

namespace App\Infrastructure\UI\Controller;

use App\Domain\Model\Repository\PostRepository;
use App\Domain\Model\Repository\SettingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 *
 * @package App\Infrastructure\UI\Controller
 */
class HomeController extends Controller
{

    /**
     * @var \App\Domain\Model\Repository\PostRepository
     */
    private $postRepository;

    /**
     * @var \App\Domain\Model\Repository\SettingRepository
     */
    private $settingRepository;

    /**
     * HomeController constructor.
     *
     * @param \App\Domain\Model\Repository\PostRepository    $postRepository
     * @param \App\Domain\Model\Repository\SettingRepository $settingRepository
     */
    public function __construct(PostRepository $postRepository, SettingRepository $settingRepository)
    {
        $this->postRepository = $postRepository;
        $this->settingRepository = $settingRepository;
    }

    /**
     * @Route("/", methods={"GET"}, name="home_index")
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $settings = $this->settingRepository->fetchByType('blog');
        $posts = $this->postRepository->fetchAll();

        return $this->render(
          "home.html.twig",
          [
            'settings' => $settings,
            'posts' => $posts,
            'subscribers' => 0,
          ]
        );
    }
}