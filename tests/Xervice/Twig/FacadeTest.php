<?php
namespace XerviceTest\Twig;

use Xervice\Core\Business\Model\Locator\Dynamic\Business\DynamicBusinessLocator;

/**
 * @method \Xervice\Twig\Business\TwigFacade getFacade()
 */
class FacadeTest extends \Codeception\Test\Unit
{
    use DynamicBusinessLocator;

    /**
     * @group Xervice
     * @group Twig
     * @group Facade
     * @group Integration
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