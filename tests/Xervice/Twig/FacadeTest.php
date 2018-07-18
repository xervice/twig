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
     */
    public function testRenderTemplate()
    {
        $this->getFacade()->addTemplatePath(__DIR__ . '/Template');

        $this->assertEquals(
            'This is a Test: Testing',
            $this->getFacade()->render(
                'test.twig',
                [
                    'paramTest' => 'Testing'
                ]
            )
        );
    }
}