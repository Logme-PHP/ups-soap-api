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
     * @test Tries to set code without a class expected attribute.
     * @expectedException Exception
     * @expectedExceptionMessage Cannot set an invalid code value.
     */
    public function it_tries_to_set_code_without_an_expected_value()
    {
        $pickupType = new PickupType();
        $pickupType->code = '99';
    }
}
