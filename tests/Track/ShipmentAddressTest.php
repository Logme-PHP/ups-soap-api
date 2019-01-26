<?php

namespace Tests\Track;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\Track\ShipmentAddress;
use Logme\Soap\Ups\Track\Type;
use Logme\Soap\Ups\Address;

class ShipmentAddressTest extends TestCase
{
    /**
     * @test Initializes required containers.
     */
    public function it_initializes_required_containers()
    {
        $shipmentAddress = new ShipmentAddress();

        $this->assertInstanceOf(Type::class, $shipmentAddress->type);
        $this->assertInstanceOf(Address::class, $shipmentAddress->address);
    }
}
