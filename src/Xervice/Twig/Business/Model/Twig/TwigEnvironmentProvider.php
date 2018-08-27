<?php


namespace Xervice\Twig\Business\Model\Twig;


use Xervice\Twig\Business\Model\Twig\Extensions\TwigExtensionCollection;

class TwigEnvironmentProvider implements TwigEnvironmentProviderInterface
{
    /**
     * @var \Twig_Environment
     */
    private $twig;

    /**
     * @var \Xervice\Twig\Business\Model\Twig\Extensions\TwigExtensionCollection
     */
    private $extensions;

    /**
     * TwigEnvironmentProvider constructor.
     *
     * @param \Twig_Environment $environment
     * @param \Xervice\Twig\Business\Model\Twig\Extensions\TwigExtensionCollection $extensions
     */
    public function __construct(
        \Twig_Environment $environment,
        TwigExtensionCollection $extensions
    ) {
        $this->twig = $environment;
        $this->extensions = $extensions;
    }

    /**
     * @return \Twig_Environment
     */
    public function getTwigEnvironment(): \Twig_Environment
    {
        $this->twig = $this->registerExtensions($this->twig);

        return $this->twig;
    }

    /**
     * @param $twig
     *
     * @return \Twig_Environment
     */
    protected function registerExtensions($twig): \Twig_Environment
    {
        foreach ($this->extensions as $extension) {
            $twig = $extension->register($twig);
        }
        return $twig;
    }


}