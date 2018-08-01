<?php

namespace Xervice\Twig\Business\Path;

interface XervicePathFinderInterface
{
    /**
     * @return array
     */
    public function getPaths(): array;
}