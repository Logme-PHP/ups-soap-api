<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\Track\TrackRequest;
use Logme\Soap\Ups\ReferenceNumber;
use Logme\Soap\Ups\PickupDateRange;

class TrackRequestTest extends TestCase
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

    /**
     * @test Sets the include mail innovations indicator attribute value.
     */
    public function it_sets_the_include_mail_innovations_indicator_attribute_value()
    {
        $trackRequest = new TrackRequest();
        $trackRequest->includeMailInnovationIndicator = true;

        $this->assertTrue($trackRequest->includeMailInnovationIndicator);
    }

    /**
     * @test Tries to set include mail innovations indicator value without a boolean value.
     * @expectedException Exception
     * @expectedExceptionMessage The include mail innovation indicator value must be a boolean type.
     */
    public function it_tries_to_set_include_mail_innovations_indicator_value_without_a_boolean_value()
    {
        $trackRequest = new TrackRequest();
        $trackRequest->includeMailInnovationIndicator = "aaaa";
    }

    /**
     * @test Sets the candidate bookmark attribute value.
     */
    public function it_sets_the_candidate_bookmark_attribute_value()
    {
        $trackRequest = new TrackRequest();
        $trackRequest->candidateBookmark = "123456";

        $this->assertEquals("123456", $trackRequest->candidateBookmark);
    }

    /**
     * @test Tries to set candidate bookmark with a value greater than 15.
     * @expectedException Exception
     * @expectedExceptionMessage The candidate bookmark value length must be between 1 and 15.
     */
    public function it_tries_to_set_candidate_bookmark_with_a_value_greater_than_15()
    {
        $trackRequest = new TrackRequest();
        $trackRequest->candidateBookmark = "1234567890123456";
    }

    /**
     * @test Sets the reference number attribute value.
     */
    public function it_sets_the_reference_number_attribute_value()
    {
        $trackRequest = new TrackRequest();
        $trackRequest->referenceNumber = new ReferenceNumber();
        $trackRequest->referenceNumber->value = "1234567890";

        $this->assertInstanceOf(ReferenceNumber::class, $trackRequest->referenceNumber);
        $this->assertEquals("1234567890", $trackRequest->referenceNumber->value);
    }

    /**
     * @test Sets the pickup date range attribute value.
     */
    public function it_sets_the_pickup_date_range_attribute_value()
    {
        $trackRequest = new TrackRequest();
        $trackRequest->pickupDateRange = new PickupDateRange();
        $trackRequest->pickupDateRange->beginDate = "20190109";
        $trackRequest->pickupDateRange->endDate = "20190110";

        $this->assertInstanceOf(PickupDateRange::class, $trackRequest->pickupDateRange);
        $this->assertEquals("20190109", $trackRequest->pickupDateRange->beginDate);
        $this->assertEquals("20190110", $trackRequest->pickupDateRange->endDate);
    }
}
