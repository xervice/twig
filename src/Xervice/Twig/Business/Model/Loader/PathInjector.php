<?php
declare(strict_types=1);


namespace Xervice\Twig\Business\Model\Loader;


class PathInjector implements PathInjectorInterface
{
    /**
     * @var \Twig_LoaderInterface
     */
    private $loader;

    /**
     * PathInjector constructor.
     *
     * @param \Twig_LoaderInterface $loader
     */
    public function __construct(\Twig_LoaderInterface $loader)
    {
        $this->loader = $loader;
    }

    /**
     * @param string $path
     */
    public function addPath(string $path): void
    {
        if (method_exists($this->loader, 'addPath')) {
            $this->loader->addPath($path);
        }
    }
}