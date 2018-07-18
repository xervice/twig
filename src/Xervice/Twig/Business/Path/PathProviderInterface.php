<?php


namespace Xervice\Twig\Business\Path;


use Xervice\Twig\Business\Loader\XerviceLoaderInterface;

interface PathProviderInterface
{
    /**
     * @param \Xervice\Twig\Business\Loader\XerviceLoaderInterface $loader
     */
    public function privideTwigPaths(XerviceLoaderInterface $loader): void;
}