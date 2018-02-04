<?php

namespace App\Infrastructure\Persistence\Memory\Repository;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Yaml;

/**
 * Class MemoryRepository
 *
 * @package App\Infrastructure\Persistence\Memory
 */
abstract class MemoryRepository
{

    const DATE_FORMAT = 'U';

    /**
     * @var \Symfony\Component\Finder\Finder
     */
    private $finder;

    /**
     * MemoryPostRepository constructor.
     *
     * @param string $fixturesDir
     */
    public function __construct(string $fixturesDir)
    {
        $this->finder = new Finder();
        $this->finder->in($fixturesDir)
          ->name('*.yaml')
          ->files();
    }

    /**
     * @return \Generator
     */
    protected function findFixtures()
    {
        foreach ($this->finder as $file) {
            yield Yaml::parse($file->getContents());
        }
    }

    /**
     * @param string $name
     *
     * @return \Generator
     */
    protected function findByName(string $name)
    {
        $this->finder->name("$name.yaml");
        foreach ($this->finder as $fixture) {
            yield Yaml::parse($fixture->getContents());
        }
    }

    /**
     * @param string $pattern
     *
     * @return \Generator
     */
    protected function findByContent(string $pattern)
    {
        $this->finder->contains($pattern);
        foreach ($this->finder as $fixture) {
            yield Yaml::parse($fixture->getContents());
        }
    }
}