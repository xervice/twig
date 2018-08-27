<?php
declare(strict_types=1);


namespace Xervice\Twig;


use Xervice\Core\Business\Model\Dependency\DependencyContainerInterface;
use Xervice\Core\Business\Model\Dependency\Provider\AbstractDependencyProvider;
use Xervice\Twig\Business\Model\Path\PathCollection;
use Xervice\Twig\Business\Model\Path\XervicePathProvider;
use Xervice\Twig\Business\Model\Twig\Extensions\TwigExtensionCollection;

class TwigDependencyProvider extends AbstractDependencyProvider
{
    public const PATH_PROVIDER_COLLECTION = 'path.provider.collection';
    public const TWIG_EXTENSIONS = 'twig.extensions';

    /**
     * @param \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface $container
     *
     * @return \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface
     */
    public function handleDependencies(DependencyContainerInterface $container): DependencyContainerInterface
    {
        $container[self::PATH_PROVIDER_COLLECTION] = function () {
            return new PathCollection(
                $this->getPathProviderList()
            );
        };

        $container[self::TWIG_EXTENSIONS] = function () {
            return new TwigExtensionCollection(
                $this->getTwigExtensions()
            );
        };

        return $container;
    }

    /**
     * @return \Xervice\Twig\Business\Dependency\Path\PathProviderInterface[]
     */
    protected function getPathProviderList(): array
    {
        return [
            new XervicePathProvider()
        ];
    }

    /**
     * @return \Xervice\Twig\Business\Dependency\Twig\Extensions\TwigExtensionInterface[]
     */
    protected function getTwigExtensions(): array
    {
        return [];
    }
}