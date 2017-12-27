<?php
/**
 * chippyash/identity
 *
 * @author    Ashley Kitson
 * @copyright Ashley Kitson, 2017, UK
 * @license   GPL V3+ See LICENSE.md
 */
namespace Chippyash\Test\Identity;

use Chippyash\Identity\Identifying;
use Chippyash\Type\Number\IntType;

class IdentifyingTest extends \PHPUnit_Framework_TestCase
{
    /**
     * System Under Test
     *
     * @var Identifying
     */
    protected $sut;

    protected function setUp()
    {
        $this->sut = $this->getMockForTrait('\Chippyash\Identity\Identifying');
        $refl = new \ReflectionClass($this->sut);
        $rParam = $refl->getProperty('id');
        $rParam->setAccessible(true);
        $rParam->setValue($this->sut, new IntType(1));
    }

    public function testYouCanRetrieveTheIdentifierAsAnObject()
    {
        $this->assertInstanceOf('Chippyash\Type\Number\IntType', $this->sut->id());
    }

    public function testYouCanRetrieveTheIdentifierValue()
    {
        $this->assertEquals(1, $this->sut->vId());
    }
}
