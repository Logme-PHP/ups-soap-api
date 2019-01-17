<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\ReferenceNumber;

class ReferenceNumberTest extends TestCase
{
    /**
     * @test Sets the value attribute value.
     */
    public function it_sets_the_value_attribute_value()
    {
        $referenceNumber = new ReferenceNumber();
        $referenceNumber->value = '123456789';

        $this->assertEquals('123456789', $referenceNumber->value);
    }

    /**
     * @test Tries to set the value attribute with a string greater than 35.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of value must be between 1 and 35.
     */
    public function it_tries_to_set_the_value_attribute_with_string_greater_than_35()
    {
        $referenceNumber = new ReferenceNumber();
        $str = str_repeat('1', 36);
        $referenceNumber->value = $str;
    }
}
