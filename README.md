Xervice: Twig

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/xervice/twig/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/xervice/twig/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/xervice/twig/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/xervice/twig/?branch=master)

Twig template engine implementation for xervice.


Installation
----------------
```
composer require xervice/twig
```


Configuration
-----------------

To define twig paths, where to search for templates, you can share a PathProvider:
```php
<?php

namespace App\Application\Plugins\Twig;

use Xervice\Twig\Business\Loader\XerviceLoaderInterface;
use Xervice\Twig\Business\Path\PathProviderInterface;

class PathLoader implements PathProviderInterface
{
    /**
     * @param \Xervice\Twig\Business\Loader\XerviceLoaderInterface $loader
     *
     * @throws \Twig_Error_Loader
     */
    public function privideTwigPaths(XerviceLoaderInterface $loader): void
    {
        $loader->addPath('path/to/my/twig-templates', 'Application');
    }
}
```

You can register your PathLoader in the TwigDependencyProvider:

```php
<?php

namespace App\Twig;

use App\Application\Plugins\Twig\PathLoader;
use Xervice\Twig\TwigDependencyProvider as XerviceTwigDependencyProvider;

class TwigDependencyProvider extends XerviceTwigDependencyProvider
{
    /**
     * @return \Xervice\Twig\Business\Path\PathProviderInterface[]
     */
    protected function getPathProviderList(): array
    {
        return [
            new PathLoader()
        ];
    }
}
```

Usage
---------

You can render templates by using the TwigFacade:
```php
$params = [];
$twigFacade->render('mytemplate.twig', $params);
```

Also you can provide the TwigService to your Kernel stack and use them in your controller. The service provide the same register-method.