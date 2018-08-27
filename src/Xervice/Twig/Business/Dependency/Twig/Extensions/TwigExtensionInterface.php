<?php


namespace Xervice\Twig\Business\Dependency\Twig\Extensions;


interface TwigExtensionInterface
{
    /**
     * @param \Twig_Environment $environment
     *
     * @return \Twig_Environment
     */
    public function register(\Twig_Environment $environment): \Twig_Environment;
}