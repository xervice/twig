<?php
declare(strict_types=1);


namespace Xervice\Twig;


use Xervice\Core\Dependency\DependencyProviderInterface;
use Xervice\Core\Dependency\Provider\AbstractProvider;
use Xervice\Twig\Business\Path\PathCollection;
use Xervice\Twig\Business\Twig\Extensions\TwigExtensionCollection;

/**
 * @method \Xervice\Core\Locator\Locator getLocator()
 */
class TwigDependencyProvider extends AbstractProvider
{
    public const PATH_PROVIDER_COLLECTION = 'path.provider.collection';

    public const TWIG_EXTENSIONS = 'twig.extensions';

    /**
     * @param \Xervice\Core\Dependency\DependencyProviderInterface $dependencyProvider
     */
    public function handleDependencies(DependencyProviderInterface $dependencyProvider): void
    {
        $dependencyProvider[self::PATH_PROVIDER_COLLECTION] = function () {
            return new PathCollection(
                $this->getPathProviderList()
            );
        };

        $dependencyProvider[self::TWIG_EXTENSIONS] = function () {
            return new TwigExtensionCollection(
                $this->getTwigExtensions()
            );
        };
    }

    /**
     * @return \Xervice\Twig\Business\Path\PathProviderInterface[]
     */
    protected function getPathProviderList(): array
    {
        return [];
    }

    /**
     * @return \Xervice\Twig\Business\Twig\Extensions\TwigExtensionInterface[]
     */
    protected function getTwigExtensions(): array
    {
        return [];
    }
}