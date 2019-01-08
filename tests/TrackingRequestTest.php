<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\Track\TrackRequest;

class TrackingRequestTest extends TestCase
{
    /**
     * @test Sets the tracking option attribute value.
     */
    public function it_sets_the_tracking_option_attribute_value()
    {
        $trackRequest = new TrackRequest();
        $trackRequest->trackingOption = $trackRequest::ENTITY_WITH_MORE_TRACKABLE_ENTITIES;

        $this->assertEquals("01", $trackRequest->trackingOption);
    }

    /**
     * @test Tries to set tracking option with an invalid string.
     * @expectedException Exception
     * @expectedExceptionMessage Cannot set an invalid tracking option value.
     */
    public function it_tries_to_set_tracking_option_with_an_invalid_string()
    {
        $trackRequest = new TrackRequest();
        $trackRequest->trackingOption = "04";
    }

    /**
     * @test Sets the inquiry number attribute value.
     */
    public function it_sets_the_inquiry_number_attribute_value()
    {
        $trackRequest = new TrackRequest();
        $trackRequest->inquiryNumber = "1234567890";

        $this->assertEquals("1234567890", $trackRequest->inquiryNumber);
    }

    /**
     * @test Tries to set inquiry number with a value with length outside the range of 9 and 34.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of inquiry number must be between 9 and 34.
     */
    public function it_tries_to_set_inquiry_number_with_a_value_with_length_outside_the_range_of_9_and_34()
    {
        $trackRequest = new TrackRequest();
        $trackRequest->inquiryNumber = "12345678";
    }
}
