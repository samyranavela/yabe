<?php

namespace App\Infrastructure\UI\Controller;

use App\Domain\Model\Repository\PostRepository;
use App\Domain\Model\Repository\SettingRepository;
use App\Domain\Model\Repository\TagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TagController
 *
 * @package App\Infrastructure\UI\Controller
 */
class TagController extends Controller
{

    /**
     * @var \App\Domain\Model\Repository\TagRepository
     */
    private $tagRepository;

    /**
     * @var \App\Domain\Model\Repository\PostRepository
     */
    private $postRepository;

    /**
     * @var \App\Domain\Model\Repository\SettingRepository
     */
    private $settingRepository;

    /**
     * TagController constructor.
     *
     * @param \App\Domain\Model\Repository\TagRepository     $tagRepository
     * @param \App\Domain\Model\Repository\PostRepository    $postRepository
     * @param \App\Domain\Model\Repository\SettingRepository $settingRepository
     */
    public function __construct(TagRepository $tagRepository, PostRepository $postRepository, SettingRepository $settingRepository)
    {
        $this->tagRepository = $tagRepository;
        $this->postRepository = $postRepository;
        $this->settingRepository = $settingRepository;
    }

    /**
     * @Route("/tag/{slug}", methods={"GET"}, name="tag_index")
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param string                                    $slug
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request, string $slug)
    {
        $settings = $this->settingRepository->fetchByType('blog');
        $tag = $this->tagRepository->fetchBySlug($slug);

        if (!$tag) {
            throw $this->createNotFoundException('Tag not found');
        }

        return $this->render(
          'tag.html.twig',
          [
            'settings' => $settings,
            'subscribers' => 0,
            'tag' => $tag,
          ]
        );
    }
}