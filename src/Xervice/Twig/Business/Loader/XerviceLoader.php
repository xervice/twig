<?php


namespace Xervice\Twig\Business\Loader;


use Xervice\Twig\Business\Path\PathCollection;

class XerviceLoader implements \Twig_LoaderInterface, XerviceLoaderInterface
{
    protected const XERVICE_NAMESPACE = '__main__';

    /**
     * @var \Twig_Loader_Filesystem
     */
    private $twigFilesystemLoader;

    /**
     * @var \Xervice\Twig\Business\Path\PathCollection
     */
    private $pathProviderCollection;

    /**
     * XerviceLoader constructor.
     *
     * @param \Twig_Loader_Filesystem $twigFilesystemLoader
     * @param \Xervice\Twig\Business\Path\PathCollection $pathProviderCollection
     */
    public function __construct(
        \Twig_Loader_Filesystem $twigFilesystemLoader,
        PathCollection $pathProviderCollection
    ) {
        $this->twigFilesystemLoader = $twigFilesystemLoader;
        $this->pathProviderCollection = $pathProviderCollection;

        $this->providePaths();
    }

    /**
     * @param string $path
     * @param string $namespace
     *
     * @throws \Twig_Error_Loader
     */
    public function addPath(string $path, string $namespace = self::XERVICE_NAMESPACE): void
    {
        $this->twigFilesystemLoader->addPath($path, $namespace);
    }

    /**
     * @param string $name
     *
     * @return \Twig_Source
     * @throws \Twig_Error_Loader
     */
    public function getSourceContext($name): \Twig_Source
    {
        return $this->twigFilesystemLoader->getSourceContext($name);
    }

    /**
     * @param string $name
     *
     * @return string
     * @throws \Twig_Error_Loader
     */
    public function getCacheKey($name): string
    {
        return $this->twigFilesystemLoader->getCacheKey($name);
    }

    /**
     * @param string $name
     * @param int $time
     *
     * @return bool
     * @throws \Twig_Error_Loader
     */
    public function isFresh($name, $time): bool
    {
        return $this->twigFilesystemLoader->isFresh($name, $time);
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    public function exists($name): bool
    {
        return $this->twigFilesystemLoader->exists($name);
    }

    protected function providePaths(): void
    {
        foreach ($this->pathProviderCollection as $pathProvider) {
            $pathProvider->privideTwigPaths($this);
        }
    }
}