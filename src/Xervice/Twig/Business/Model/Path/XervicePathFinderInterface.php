<?php

namespace Xervice\Twig\Business\Model\Path;

interface XervicePathFinderInterface
{
    /**
     * @return array
     */
    public function getPaths(): array;
}