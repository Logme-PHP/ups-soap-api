<?php

namespace Tests\Track;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\Track\Shipment;

class ShipmentTest extends TestCase
{
    /**
     * @test Sets the shipper number value.
     */
    public function it_sets_the_shipper_number_value()
    {
        $shipment = new Shipment();
        $shipment->shipperNumber = '1234567';

        $this->assertEquals('1234567', $shipment->shipperNumber);
    }

    /**
     * @test Tries to set shipper number with a string length out of range of 6 and 10.
     * @expectedException Exception
     * @expectedExceptionMessage The shipper number must be a string with length between 6 and 10.
     */
    public function it_tries_to_set_shipper_number_with_a_string_length_out_of_range_of_6_and_10()
    {
        $shipment = new Shipment();
        $shipment->shipperNumber = '1345';
    }

    /**
     * @test Sets the candidate bookmark value.
     */
    public function it_sets_the_candidate_bookmark_value()
    {
        $shipment = new Shipment();
        $shipment->candidateBookmark = '1234567890';

        $this->assertEquals('1234567890', $shipment->candidateBookmark);
    }

    /**
     * @test Tries to set candidate bookmark with a string length out of range of 1 and 15.
     * @expectedException Exception
     * @expectedExceptionMessage The candidate bookmark must be a string with a length between 1 and 15.
     */
    public function it_tries_to_set_candidate_bookmark_with_a_string_length_out_of_range_of_1_and_15()
    {
        $shipment = new Shipment();
        $shipment->candidateBookmark = '1234567890123456';
    }
}
