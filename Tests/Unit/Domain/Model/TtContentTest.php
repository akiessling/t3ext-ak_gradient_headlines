<?php
namespace AndreasKiessling\AkGradientHeadlines\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Andreas Kießling <andreas@powered-by-coffee.de>
 */
class TtContentTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \AndreasKiessling\AkGradientHeadlines\Domain\Model\TtContent
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \AndreasKiessling\AkGradientHeadlines\Domain\Model\TtContent();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getGradientReturnsInitialValueForGradient()
    {
        self::assertEquals(
            null,
            $this->subject->getGradient()
        );
    }

    /**
     * @test
     */
    public function setGradientForGradientSetsGradient()
    {
        $gradientFixture = new \AndreasKiessling\AkGradientHeadlines\Domain\Model\Gradient();
        $this->subject->setGradient($gradientFixture);

        self::assertAttributeEquals(
            $gradientFixture,
            'gradient',
            $this->subject
        );
    }
}
