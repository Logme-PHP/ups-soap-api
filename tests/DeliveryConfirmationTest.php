<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\DeliveryConfirmation;

class DeliveryConfirmationTest extends TestCase
{
    /**
     * @test Sets DCIS type with a valid value.
     */
    public function it_sets_dcis_type_with_a_valid_value()
    {
        $deliveryConfirmation = new DeliveryConfirmation();
        $deliveryConfirmation->DCISType = $deliveryConfirmation::DELIVERY_CONFIRMATION;

        $this->assertEquals("1", $deliveryConfirmation->DCISType);
    }

    /**
     * @test Tries to set DCIS type with an invalid value.
     * @expectedException Exception
     * @expectedExceptionMessage Cannot set attribute with an invalid value.
     */
    public function it_tries_to_set_dcis_type_with_an_invalid_value()
    {
        $deliveryConfirmation = new DeliveryConfirmation();
        $deliveryConfirmation->DCISType = "5";
    }
}
