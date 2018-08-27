<?php


namespace Xervice\Twig\Business\Model\Path;


use Symfony\Component\Finder\Finder;

class XervicePathFinder extends Finder implements XervicePathFinderInterface
{
    /**
     * @var array
     */
    private $paths;

    /**
     * XervicePathFinder constructor.
     *
     * @param array $paths
     */
    public function __construct(array $paths)
    {
        $this->paths = $paths;
    }

    /**
     * @return $this
     */
    public function getPaths()
    {
        $paths = [];

        return $this->in($this->paths)->directories();

        return $this;
    }

}