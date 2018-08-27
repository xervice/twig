<?php
declare(strict_types=1);

namespace Xervice\Twig\Business\Model\Loader;

interface XerviceLoaderInterface
{
    /**
     * @param string $path
     * @param string $namespace
     *
     * @throws \Twig_Error_Loader
     */
    public function addPath(string $path, string $namespace);
}