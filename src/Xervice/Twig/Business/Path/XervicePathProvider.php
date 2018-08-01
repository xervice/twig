<?php


namespace Xervice\Twig\Business\Path;


use Symfony\Component\Finder\Finder;
use Xervice\Core\Locator\AbstractWithLocator;
use Xervice\Twig\Business\Loader\XerviceLoaderInterface;

/**
 * @method \Xervice\Twig\TwigFactory getFactory()
 */
class XervicePathProvider extends AbstractWithLocator implements PathProviderInterface
{
    /**
     * @param \Xervice\Twig\Business\Loader\XerviceLoaderInterface $loader
     *
     * @throws \Core\Locator\Dynamic\ServiceNotParseable
     * @throws \Twig_Error_Loader
     */
    public function provideTwigPaths(XerviceLoaderInterface $loader): void
    {
        foreach ($this->getFactory()->createPathFinder()->getPaths() as $path) {
            if (is_dir($path . '/Presentation/Theme')) {
                $namespace = basename($path);
                $loader->addPath(
                    $path . '/Presentation/Theme',
                    $namespace
                );
            }
        }
    }
}