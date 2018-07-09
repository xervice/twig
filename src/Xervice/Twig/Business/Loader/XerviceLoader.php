<?php


namespace Xervice\Twig\Business\Loader;


class XerviceLoader implements \Twig_LoaderInterface
{
    /**
     * @param string $name
     *
     * @return \Twig_Source
     * @throws \Twig_Error_Loader
     */
    public function getSourceContext($name)
    {
    }

    /**
     * @param string $name
     *
     * @return string
     * @throws \Twig_Error_Loader
     */
    public function getCacheKey($name)
    {
    }

    /**
     * @param string $name
     * @param int $time
     *
     * @return bool
     * @throws \Twig_Error_Loader
     */
    public function isFresh($name, $time)
    {
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    public function exists($name)
    {
    }

    private function findTemplate(string $template)
    {

    }
}