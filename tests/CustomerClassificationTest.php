<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\CustomerClassification;

class CustomerClassificationTest extends TestCase
{
    /**
     * @test Sets the code attribute.
     */
    public function it_sets_code_value_properly()
    {
        $customerClassification = new CustomerClassification();
        $customerClassification->code = $customerClassification::RATES_ASSOCIATED_WITH_SHIPPER_NUMBER;
        
        $this->assertEquals("00", $customerClassification->code);
        $this->assertEquals("Rates associated with shipper number", $customerClassification->description);
    }

    /**
     * @test Tries to set code without a class expected attribute.
     * @expectedException Exception
     * @expectedExceptionMessage Cannot set an invalid code value.
     */
    public function it_tries_to_set_code_without_an_expected_value()
    {
        $customerClassification = new CustomerClassification();
        $customerClassification->code = "99";
    }
}
