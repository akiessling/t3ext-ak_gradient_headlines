<?php
namespace AndreasKiessling\AkGradientHeadlines\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Andreas Kießling <andreas@powered-by-coffee.de>
 */
class GradientTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \AndreasKiessling\AkGradientHeadlines\Domain\Model\Gradient
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \AndreasKiessling\AkGradientHeadlines\Domain\Model\Gradient();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getStartColorReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getStartColor()
        );
    }

    /**
     * @test
     */
    public function setStartColorForStringSetsStartColor()
    {
        $this->subject->setStartColor('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'startColor',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getEndColorReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getEndColor()
        );
    }

    /**
     * @test
     */
    public function setEndColorForStringSetsEndColor()
    {
        $this->subject->setEndColor('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'endColor',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAngleReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getAngle()
        );
    }

    /**
     * @test
     */
    public function setAngleForIntSetsAngle()
    {
        $this->subject->setAngle(12);

        self::assertAttributeEquals(
            12,
            'angle',
            $this->subject
        );
    }
}
