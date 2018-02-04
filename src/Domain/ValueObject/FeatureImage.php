<?php

namespace App\Domain\ValueObject;

/**
 * Class FeatureImage
 *
 * @package App\Domain\ValueObject
 */
final class FeatureImage
{

    /**
     * @var string
     */
    private $url;

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }
}