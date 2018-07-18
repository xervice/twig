<?php

namespace Xervice\Twig\Business\Loader;

interface XerviceLoaderInterface
{
    /**
     * @param string $path
     * @param string $namespace
     *
     * @throws \Twig_Error_Loader
     */
    public function addPath(string $path, string $namespace = self::XERVICE_NAMESPACE);
}