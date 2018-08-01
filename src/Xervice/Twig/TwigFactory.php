<?php
declare(strict_types=1);


namespace Xervice\Twig;


use Xervice\Core\Factory\AbstractFactory;
use Xervice\Twig\Business\Loader\PathInjector;
use Xervice\Twig\Business\Loader\PathInjectorInterface;
use Xervice\Twig\Business\Loader\XerviceLoader;
use Xervice\Twig\Business\Path\PathCollection;
use Xervice\Twig\Business\Path\XervicePathFinder;
use Xervice\Twig\Business\Path\XervicePathFinderInterface;
use Xervice\Twig\Business\Twig\Extensions\TwigExtensionCollection;
use Xervice\Twig\Business\Twig\TwigEnvironmentProvider;
use Xervice\Twig\Business\Twig\TwigEnvironmentProviderInterface;

/**
 * @method \Xervice\Twig\TwigConfig getConfig()
 */
class TwigFactory extends AbstractFactory
{
    /**
     * @var \Twig_Environment
     */
    private $twigEnvironment;

    /**
     * @return \Xervice\Twig\Business\Twig\TwigEnvironmentProviderInterface
     */
    public function createTwigEnvironmentProvider(): TwigEnvironmentProviderInterface
    {
        return new TwigEnvironmentProvider(
            $this->createTwigEnvironment(),
            $this->getTwigExtensionCollection()
        );
    }

    /**
     * @return \Twig_Environment
     */
    public function createTwigEnvironment(): \Twig_Environment
    {
        return new \Twig_Environment(
            $this->createXerviceLoader(),
            [
                'debug'               => $this->getConfig()->isDebug(),
                'charset'             => $this->getConfig()->getCharset(),
                'base_template_class' => $this->getConfig()->getBaseTemplateClass(),
                'strict_variables'    => $this->getConfig()->isStrictVariables(),
                'autoescape'          => $this->getConfig()->getAutoescape(),
                'cache'               => $this->getConfig()->isCache() ? $this->getConfig()->getCachePath() : false,
                'auto_reload'         => $this->getConfig()->isAutoReload(),
                'optimizations'       => $this->getConfig()->getOptimization()
            ]
        );
    }

    /**
     * @return \Xervice\Twig\Business\Path\XervicePathFinderInterface
     */
    public function createPathFinder(): XervicePathFinderInterface
    {
        return new XervicePathFinder(
            $this->getConfig()->getModulePaths()
        );
    }

    /**
     * @return \Xervice\Twig\Business\Loader\PathInjector
     */
    public function createPathInjector(): PathInjectorInterface
    {
        return new PathInjector(
            $this->getTwigEnvironment()->getLoader()
        );
    }

    /**
     * @return \Twig_LoaderInterface
     */
    public function createXerviceLoader(): \Twig_LoaderInterface
    {
        return new XerviceLoader(
            $this->createTwigFilesystemLoader(),
            $this->getPathProviderCollection()
        );
    }

    /**
     * @return \Twig_Loader_Filesystem
     */
    public function createTwigFilesystemLoader(): \Twig_Loader_Filesystem
    {
        return new \Twig_Loader_Filesystem();
    }

    /***
     * @return \Twig_Environment
     */
    public function getTwigEnvironment(): \Twig_Environment
    {
        if ($this->twigEnvironment === null) {
            $this->twigEnvironment = $this->createTwigEnvironmentProvider()->getTwigEnvironment();
        }

        return $this->twigEnvironment;
    }

    /**
     * @return \Xervice\Twig\Business\Path\PathCollection
     */
    public function getPathProviderCollection(): PathCollection
    {
        return $this->getDependency(TwigDependencyProvider::PATH_PROVIDER_COLLECTION);
    }

    /**
     * @return \Xervice\Twig\Business\Twig\Extensions\TwigExtensionCollection
     */
    public function getTwigExtensionCollection(): TwigExtensionCollection
    {
        return $this->getDependency(TwigDependencyProvider::TWIG_EXTENSIONS);
    }

    public function getPathFinder()
    {
        
    }
}