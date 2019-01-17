<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\InquiryNumber;

class InquiryNumberTest extends TestCase
{
    /**
     * @test Sets inquiry number value
     */
    public function it_sets_inquiry_number_value()
    {
        $inquiryNumber = new InquiryNumber();
        $inquiryNumber->value = '1234567890';

        $this->assertEquals('1234567890', $inquiryNumber->value);
    }

    /**
     * @test Tries to set inquiry number with a string greater than 34
     * @expectedException Exception
     * @expectedExceptionMessage The string length of value needs to be between 1 and 34.
     */
    public function it_tries_to_set_inquiry_number_with_a_string_greater_than_34()
    {
        $inquiryNumber = new InquiryNumber();
        $str = str_repeat('1', 35);
        $inquiryNumber->value = $str;
    }
}
