<?php


namespace Xervice\Twig\Business\Kernel;


use Xervice\Core\Locator\AbstractWithLocator;
use Xervice\Kernel\Business\Service\ClearServiceInterface;

/**
 * @method \Xervice\Twig\TwigFacade getFacade()
 */
class TwigService extends AbstractWithLocator implements ClearServiceInterface
{
    /**
     * @param string $template
     * @param array $params
     *
     * @return string
     * @throws \Core\Locator\Dynamic\ServiceNotParseable
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function render(string $template, array $params = []): string
    {
        return $this->getFacade()->render($template, $params);
    }
}