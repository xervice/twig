<?php
declare(strict_types=1);


namespace Xervice\Twig;


use Xervice\Config\Business\XerviceConfig;
use Xervice\Core\Business\Model\Config\AbstractConfig;
use Xervice\Core\CoreConfig;

class TwigConfig extends AbstractConfig
{
    public const DEBUG = 'twig.debug';

    public const CHARSET = 'twig.charset';

    public const BASE_TEMPLATE_CLASS = 'twig.base.template.class';

    public const STRICT_VARIABLES = 'twig.strict.variables';

    public const AUTOESCAPE = 'twig.autoescape';

    public const CACHE = 'twig.cache';

    public const CACHE_PATH = 'twig.cache.path';

    public const AUTO_RELOAD = 'twig.auto.reload';

    public const OPTIMIZATIONS = 'twig.optimizations';

    public const MODULE_PATHS = 'twig.module.paths';

    /**
     * @return array
     */
    public function getModulePaths(): array
    {
        return $this->get(
            self::MODULE_PATHS,
            [
                sprintf(
                    '%s/src/*',
                    $this->get(XerviceConfig::APPLICATION_PATH)
                ),
                sprintf(
                    '%s/src/%s',
                    $this->get(XerviceConfig::APPLICATION_PATH),
                    'Xervice'
                ),
                sprintf(
                    '%s/vendor/xervice/*/src/Xervice',
                    $this->get(XerviceConfig::APPLICATION_PATH)
                )
            ]
        );
    }

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