<?php


namespace Xervice\Twig\Business\Model\Path;


use Xervice\Core\Plugin\AbstractBusinessPlugin;
use Xervice\Twig\Business\Dependency\Path\PathProviderInterface;
use Xervice\Twig\Business\Model\Loader\XerviceLoaderInterface;

/**
 * @method \Xervice\Twig\Business\TwigBusinessFactory getFactory()
 */
class XervicePathProvider extends AbstractBusinessPlugin implements PathProviderInterface
{
    /**
     * @param \Xervice\Twig\Business\Model\Loader\XerviceLoaderInterface $loader
     *
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