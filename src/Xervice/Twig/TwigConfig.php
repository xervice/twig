<?php


namespace Xervice\Twig;


use Xervice\Core\Config\AbstractConfig;

class TwigConfig extends AbstractConfig
{
    public const DEBUG = 'debug';

    public const CHARSET = 'charset';

    public const BASE_TEMPLATE_CLASS = 'base.template.class';

    public const STRICT_VARIABLES = 'strict.variables';

    public const AUTOESCAPE = 'autoescape';

    public const CACHE = 'cache';

    public const CACHE_PATH = 'cache.path';

    public const AUTO_RELOAD = 'auto.reload';

    public const OPTIMIZATIONS = 'optimizations';

    /**
     * @return bool
     */
    public function isDebug(): bool
    {
        return $this->get(self::DEBUG, false);
    }

    /**
     * @return string
     */
    public function getCharset(): string
    {
        return $this->get(self::CHARSET, 'UTF-8');
    }

    /**
     * @return string
     */
    public function getBaseTemplateClass(): string
    {
        return $this->get(self::BASE_TEMPLATE_CLASS, 'Twig_Template');
    }

    /**
     * @return bool
     */
    public function isStrictVariables(): bool
    {
        return $this->get(self::STRICT_VARIABLES, false);
    }

    /**
     * @return string
     */
    public function getAutoescape(): string
    {
        return $this->get(self::AUTOESCAPE, 'html');
    }

    /**
     * @return bool
     */
    public function isCache(): bool
    {
        return $this->get(self::CACHE, false);
    }

    /**
     * @return string
     */
    public function getCachePath(): string
    {
        return $this->get(self::CACHE_PATH);
    }

    /**
     * @return bool
     */
    public function isAutoReload(): bool
    {
        return $this->get(self::AUTO_RELOAD, false);
    }

    /**
     * @return int
     */
    public function getOptimization(): int
    {
        return $this->get(self::OPTIMIZATIONS, -1);
    }
}