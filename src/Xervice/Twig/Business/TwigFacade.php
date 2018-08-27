<?php
declare(strict_types=1);


namespace Xervice\Twig\Business;
use Xervice\Core\Business\Model\Facade\AbstractFacade;

/**
 * @method \Xervice\Twig\Business\TwigBusinessFactory getFactory()
 * @method \Xervice\Twig\TwigConfig getConfig()
 */
class TwigFacade extends AbstractFacade
{
    /**
     * @param string $template
     * @param array $params
     *
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function render(string $template, array $params = []): string
    {
        return $this->getFactory()->getTwigEnvironment()->render($template, $params);
    }

    /**
     * @param string $path
     */
    public function addTemplatePath(string $path): void
    {
        $this->getFactory()->createPathInjector()->addPath($path);
    }
}