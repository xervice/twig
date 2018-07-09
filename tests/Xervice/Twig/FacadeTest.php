<?php
namespace XerviceTest\Twig;

use Xervice\Core\Locator\Locator;

class FacadeTest extends \Codeception\Test\Unit
{
    /**
     * @var \Xervice\Twig\TwigFacade
     */
    protected $facade;
    
    protected function _before()
    {
        $this->facade = Locator::getInstance()->twig()->facade();
    }

    /**
     * @group Xervice
     * @group Twig
     * @group Facade
     * @group Integration
     */
    public function testSomeMethod()
    {
        // todo
    }
}