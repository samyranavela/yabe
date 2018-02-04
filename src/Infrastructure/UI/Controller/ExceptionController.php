<?php

namespace App\Infrastructure\UI\Controller;

use App\Domain\Model\Repository\PostRepository;
use App\Domain\Model\Repository\SettingRepository;
use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Log\DebugLoggerInterface;
use Twig\Environment;

/**
 * Class ExceptionController
 *
 * @package App\Infrastructure\UI\Controller
 */
class ExceptionController extends \Symfony\Bundle\TwigBundle\Controller\ExceptionController
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
     * ExceptionController constructor.
     *
     * @param \Twig\Environment                              $twig
     * @param bool                                           $debug
     * @param \App\Domain\Model\Repository\PostRepository    $postRepository
     * @param \App\Domain\Model\Repository\SettingRepository $settingRepository
     */
    public function __construct(Environment $twig, bool $debug, PostRepository $postRepository, SettingRepository $settingRepository)
    {
        parent::__construct($twig, $debug);

        $this->postRepository = $postRepository;
        $this->settingRepository = $settingRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function showAction(Request $request, FlattenException $exception, DebugLoggerInterface $logger = null)
    {
        $currentContent = $this->getAndCleanOutputBuffering($request->headers->get('X-Php-Ob-Level', -1));
        $showException = $request->attributes->get(
          'showException',
          $this->debug
        ); // As opposed to an additional parameter, this maintains BC

        $code = $exception->getStatusCode();

        $settings = $this->settingRepository->fetchByType('blog');
        $posts = $this->postRepository->fetchAll(2);

        return new Response(
          $this->twig->render(
            (string)$this->findTemplate($request, $request->getRequestFormat(), $code, $showException),
            [
              'status_code' => $code,
              'status_text' => isset(Response::$statusTexts[$code]) ? Response::$statusTexts[$code] : '',
              'exception' => $exception,
              'logger' => $logger,
              'currentContent' => $currentContent,
              'settings' => $settings,
              'subscribers' => 0,
              'posts' => $posts,
            ]
          ), $code, ['Content-Type' => $request->getMimeType($request->getRequestFormat()) ?: 'text/html']
        );
    }
}