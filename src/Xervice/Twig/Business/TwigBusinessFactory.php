<?php
declare(strict_types=1);


namespace Xervice\Twig\Business;


use Xervice\Core\Business\Model\Factory\AbstractBusinessFactory;
use Xervice\Twig\Business\Model\Loader\PathInjector;
use Xervice\Twig\Business\Model\Loader\PathInjectorInterface;
use Xervice\Twig\Business\Model\Loader\XerviceLoader;
use Xervice\Twig\Business\Model\Path\PathCollection;
use Xervice\Twig\Business\Model\Path\XervicePathFinder;
use Xervice\Twig\Business\Model\Path\XervicePathFinderInterface;
use Xervice\Twig\Business\Model\Twig\Extensions\TwigExtensionCollection;
use Xervice\Twig\Business\Model\Twig\TwigEnvironmentProvider;
use Xervice\Twig\Business\Model\Twig\TwigEnvironmentProviderInterface;
use Xervice\Twig\TwigDependencyProvider;

/**
 * @method \Xervice\Twig\TwigConfig getConfig()
 */
class TwigBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @var \Twig_Environment
     */
    private $twigEnvironment;

    /**
     * @return \Xervice\Twig\Business\Model\Twig\TwigEnvironmentProviderInterface
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
     * @return \Xervice\Twig\Business\Model\Path\XervicePathFinderInterface
     */
    public function createPathFinder(): XervicePathFinderInterface
    {
        return new XervicePathFinder(
            $this->getConfig()->getModulePaths()
        );
    }

    /**
     * @return \Xervice\Twig\Business\Model\Loader\PathInjectorInterface
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
     * @return \Xervice\Twig\Business\Model\Path\PathCollection
     */
    public function getPathProviderCollection(): PathCollection
    {
        return $this->getDependency(TwigDependencyProvider::PATH_PROVIDER_COLLECTION);
    }

    /**
     * @return \Xervice\Twig\Business\Model\Twig\Extensions\TwigExtensionCollection
     */
    public function getTwigExtensionCollection(): TwigExtensionCollection
    {
        return $this->getDependency(TwigDependencyProvider::TWIG_EXTENSIONS);
    }
}