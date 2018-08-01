<?php
namespace XerviceTest\Twig;

use Xervice\Core\Facade\FacadeInterface;
use Xervice\Core\Locator\Dynamic\DynamicLocator;

/**
 * @method \Xervice\Twig\TwigFacade getFacade()
 */
class FacadeTest extends \Codeception\Test\Unit
{
    use DynamicLocator;

    /**
     * @group Xervice
     * @group Twig
     * @group Facade
     * @group Integration
     * @throws \Core\Locator\Dynamic\ServiceNotParseable
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function testRenderTemplate()
    {
        $this->assertEquals(
            'This is a Test: Testing',
            $this->getFacade()->render(
                '@Twig/test.twig',
                [
                    'paramTest' => 'Testing'
                ]
            )
        );
    }
}