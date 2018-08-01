<?php
declare(strict_types=1);


namespace Xervice\Twig\Business\Path;


use Xervice\Twig\Business\Loader\XerviceLoaderInterface;

interface PathProviderInterface
{
    /**
     * @param \Xervice\Twig\Business\Loader\XerviceLoaderInterface $loader
     */
    public function provideTwigPaths(XerviceLoaderInterface $loader): void;
}