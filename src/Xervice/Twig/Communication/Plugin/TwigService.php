<?php
declare(strict_types=1);

namespace Xervice\Twig\Communication\Plugin;
use Xervice\Core\Plugin\AbstractCommunicationPlugin;
use Xervice\Kernel\Business\Plugin\ClearServiceInterface;


/**
 * @method \Xervice\Twig\Business\TwigFacade getFacade()
 */
class TwigService extends AbstractCommunicationPlugin implements ClearServiceInterface
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
        return $this->getFacade()->render($template, $params);
    }
}