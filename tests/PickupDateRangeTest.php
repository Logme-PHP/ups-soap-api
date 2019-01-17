<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\PickupDateRange;

class PickupDateRangeTest extends TestCase
{
    /**
     * @test Sets the begin date with string formatted has YYYYMMDD.
     */
    public function it_sets_the_begin_date_with_string_formatted_has_yyyy_mm_dd()
    {
        $pickupDateRange = new PickupDateRange();
        $pickupDateRange->beginDate = '20190109';

        $this->assertEquals('20190109', $pickupDateRange->beginDate);
    }

    /**
     * @test Tries to set begin date with a string length not equal to 8.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of begin date must be equals to 8.
     */
    public function it_tries_to_set_begin_date_with_a_string_length_not_equals_to_8()
    {
        $pickupDateRange = new PickupDateRange();
        $pickupDateRange->beginDate = '123456789';
    }

    /**
     * @test Tries to set begin date without a string formatted has YYYYMMDD.
     * @expectedException Exception
     * @expectedExceptionMessage The begin date string needs to be a valid date formatted has YYYYMMDD.
     */
    public function it_tries_to_set_begin_date_without_a_string_formatted_has_yyyy_mm_dd()
    {
        $pickupDateRange = new PickupDateRange();
        $pickupDateRange->beginDate = '12300234';
    }

    /**
     * @test Sets the end date with string formatted has YYYYMMDD.
     */
    public function it_sets_the_end_date_with_string_formatted_has_yyyy_mm_dd()
    {
        $pickupDateRange = new PickupDateRange();
        $pickupDateRange->endDate = '20190110';

        $this->assertEquals('20190110', $pickupDateRange->endDate);
    }

    /**
     * @test Tries to set end date with a string length not equal to 8.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of end date must be equals to 8.
     */
    public function it_tries_to_set_end_date_with_a_string_length_not_equals_to_8()
    {
        $pickupDateRange = new PickupDateRange();
        $pickupDateRange->endDate = '123456789';
    }

    /**
     * @test Tries to set end date without a string formatted has YYYYMMDD.
     * @expectedException Exception
     * @expectedExceptionMessage The end date string needs to be a valid date formatted has YYYYMMDD.
     */
    public function it_tries_to_set_end_date_without_a_string_formatted_has_yyyy_mm_dd()
    {
        $pickupDateRange = new PickupDateRange();
        $pickupDateRange->endDate = '12300234';
    }
}
