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

        $this->assertEquals('00', $customerClassification->code);
        $this->assertEquals('Rates associated with shipper number', $customerClassification->description);
    }

    /**
     * @test Sets code without a class expected attribute.
     */
    public function it_sets_code_without_an_expected_value()
    {
        $customerClassification = new CustomerClassification();
        $customerClassification->code = '99';

        $this->assertEquals('99', $customerClassification->code);
        $this->assertEquals('Unknown code', $customerClassification->description);
    }
}
