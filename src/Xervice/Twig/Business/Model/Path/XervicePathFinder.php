<?php


namespace Xervice\Twig\Business\Model\Path;


class XervicePathFinder implements XervicePathFinderInterface
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
     * @return array
     */
    public function getPaths(): array
    {
        $paths = [];
        foreach ($this->paths as $path) {
            if (is_dir($path)) {
                $paths = array_merge(
                    $paths,
                    glob($path . '/*')
                );
            }
        }

        return $paths;
    }

}