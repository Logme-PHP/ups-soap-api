<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\Commodity;
use Logme\Soap\Ups\NMFC;

class CommodityTest extends TestCase
{
    /**
     * Commodity instance.
     *
     * @var Commodity;
     */
    public $commodity;

    /**
     * Set up defaults values for all tests.
     */
    public function setUp()
    {
        parent::setUp();
        $this->commodity = new Commodity();
    }

    /**
     * @test Sets defaults attributes values.
     */
    public function it_sets_defaults_attributes_values()
    {
        $this->assertInstanceOf(NMFC::class, $this->commodity->NMFC);
    }

    /**
     * @test Sets the freight class attribute.
     */
    public function it_sets_the_freight_class_attribute()
    {
        $this->commodity->freightClass = 'freight01';

        $this->assertEquals('freight01', $this->commodity->freightClass);
    }

    /**
     * @test Tries to set the freight class attribute with string greater than 20.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of freight class must be less or equal to 10.
     */
    public function it_tries_to_set_the_freight_class_attribute_with_string_greater_than_10()
    {
        $this->commodity->freightClass = 'freight0111';
    }

    /**
     * @test Sets the NMFC container.
     */
    public function it_sets_the_NMFC_container()
    {
        $this->assertNull($this->commodity->NMFC->primeCode);
        $this->assertEquals('00', $this->commodity->NMFC->subCode);

        $NMFC = new NMFC();
        $NMFC->primeCode = 'AAAA';
        $NMFC->subCode = '01';

        $this->commodity->NMFC = $NMFC;

        $this->assertEquals('AAAA', $this->commodity->NMFC->primeCode);
        $this->assertEquals('01', $this->commodity->NMFC->subCode);
    }
}
