<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\Commodity;

class CommodityTest extends TestCase
{
    /**
     * @test Sets the freight class attribute.
     */
    public function it_sets_the_freight_class_attribute()
    {
        $commodity = new Commodity();
        $commodity->freightClass = "freight01";

        $this->assertEquals("freight01", $commodity->freightClass);
    }

    /**
     * @test Tries to set the freight class attribute with string greater than 20.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of freight class must be less or equal to 10.
     */
    public function it_tries_to_set_the_freight_class_attribute_with_string_greater_than_10()
    {
        $commodity = new Commodity();
        $commodity->freightClass = "freight0111";
    }
}
