<?php

namespace App\Infrastructure\UI\Controller;

use App\Domain\Model\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Zend\Feed\Writer\Entry;
use Zend\Feed\Writer\Feed;

/**
 * Class RssController
 *
 * @package App\Infrastructure\UI\Controller
 */
class RssController extends Controller
{

    /**
     * @var \App\Domain\Model\Repository\PostRepository
     */
    private $postRepository;

    /**
     * HomeController constructor.
     *
     * @param \App\Domain\Model\Repository\PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @Route("/feeds/rss.xml", methods={"GET"}, name="rss")
     */
    public function indexAction()
    {
        $feed = new Feed();
        $feed->setEncoding('UTF-8');
        $feed->setTitle('Paddy\'s Blog');
        $feed->setLink($this->generateUrl('home_index', [], UrlGeneratorInterface::ABSOLUTE_URL));
        $feed->setFeedLink($this->generateUrl('rss', [], UrlGeneratorInterface::ABSOLUTE_URL), 'atom');
        $feed->addAuthor(
          [
            'name' => 'Paddy',
            'email' => 'paddy@example.com',
            'uri' => $this->generateUrl(
              'author_index',
              ['slug' => 'ghost'],
              UrlGeneratorInterface::ABSOLUTE_URL
            ),
          ]
        );
        $feed->setDescription('YABE');
        $feed->setDateModified(time());

        foreach ($this->postRepository->fetchAll() as $post) {
            $entry = new Entry();
            $entry->setContent($post->getHtml());
            $entry->setTitle($post->getTitle());
            $entry->setLink(
              $this->generateUrl('post_index', ['slug' => $post->getSlug()], UrlGeneratorInterface::ABSOLUTE_URL)
            );
            $entry->setDateCreated($post->getPublishedAt());
            $feed->addEntry($entry);
        }

        $response = new Response($feed->export('rss'));
        $response->headers->add(
          [
            'Content-Type' => 'text/xml',
            'charset' => 'UTF-8',
          ]
        );

        return $response;
    }
}