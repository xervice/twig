<?php
declare(strict_types=1);

namespace Xervice\Twig\Business\Loader;

interface PathInjectorInterface
{
    /**
     * @param string $path
     */
    public function addPath(string $path): void;
}