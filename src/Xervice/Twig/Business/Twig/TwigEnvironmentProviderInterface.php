<?php

namespace Xervice\Twig\Business\Twig;

interface TwigEnvironmentProviderInterface
{
    /**
     * @return \Twig_Environment
     */
    public function getTwigEnvironment(): \Twig_Environment;
}