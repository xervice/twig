<?php
declare(strict_types=1);


namespace Xervice\Twig\Business\Dependency\Path;


use Xervice\Twig\Business\Model\Loader\XerviceLoaderInterface;

interface PathProviderInterface
{
    /**
     * @param \Xervice\Twig\Business\Model\Loader\XerviceLoaderInterface $loader
     */
    public function provideTwigPaths(XerviceLoaderInterface $loader): void;
}