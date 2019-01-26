<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\PickupType;

class PickupTypeTest extends TestCase
{
    /**
     * @test Sets the code attribute.
     */
    public function it_sets_code_value_properly()
    {
        $pickupType = new PickupType();
        $pickupType->code = $pickupType::CUSTOMER_COUNTER;

        $this->assertEquals('03', $pickupType->code);
        $this->assertEquals('Customer Counter', $pickupType->description);
    }

    /**
     * @test Sets code without a class expected attribute.
     */
    public function it_sets_code_without_an_expected_value()
    {
        $pickupType = new PickupType();
        $pickupType->code = '99';

        $this->assertEquals('99', $pickupType->code);
        $this->assertEquals('Unknown code', $pickupType->description);
    }
}
