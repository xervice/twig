<?php

use Xervice\DataProvider\DataProviderConfig;
use Xervice\Twig\TwigConfig;

$config[DataProviderConfig::DATA_PROVIDER_GENERATED_PATH] = dirname(__DIR__) . '/src/Generated';
$config[DataProviderConfig::DATA_PROVIDER_PATHS] = [
    dirname(__DIR__) . '/src/',
    dirname(__DIR__) . '/vendor/'
];

if (class_exists(TwigConfig::class)) {
    $config[TwigConfig::MODULE_PATHS] = [
        dirname(__DIR__) . '/tests/*'
    ];
}