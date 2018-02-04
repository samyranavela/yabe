<?php

namespace App\Infrastructure\UI\Controller;

use App\Domain\Model\Repository\PostRepository;
use App\Domain\Model\Repository\SettingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PostController
 *
 * @package App\Infrastructure\UI\Controller
 */
class PostController extends Controller
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
     * @Route("/{slug}", methods={"GET"}, name="post_index")
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param string                                    $slug
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request, string $slug)
    {
        $settings = $this->settingRepository->fetchByType('blog');
        $post = $this->postRepository->fetchBySlug($slug);

        $template = $post->isPage() ? 'page.html.twig' : 'post.html.twig';

        return $this->render(
          $template,
          [
            'settings' => $settings,
            'subscribers' => 0,
            'post' => $post,
          ]
        );
    }
}