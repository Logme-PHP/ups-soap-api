<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\TransactionReference;

class TransactionReferenceTest extends TestCase
{
    /**
     * @test Sets the customer context attribute value.
     */
    public function it_sets_customer_context_attribute_value()
    {
        $transactionReference = new TransactionReference();
        $transactionReference->customerContext = 'Send my identifier number.';

        $this->assertEquals('Send my identifier number.', $transactionReference->customerContext);
    }

    /**
     * @test Tries to set customer context with string greater than 512.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of customer context must be less or equal to 512.
     */
    public function it_tries_to_set_customer_context_context_with_string_greater_than_512()
    {
        $transactionReference = new TransactionReference();
        $str = str_repeat('a', 513);
        $transactionReference->customerContext = $str;
    }

    /**
     * @test Tries to set an unrecognized attribute.
     * @expectedException Exception
     * @expectedExceptionMessage Unrecognized method setBanana.
     */
    public function it_tries_to_set_an_unrecognized_method()
    {
        $transactionReference = new TransactionReference();
        $transactionReference->banana = 'banana';
    }

    /**
     * @test Tries to get value from an unrecognized attribute.
     * @expectedException Exception
     * @expectedExceptionMessage Unrecognized attribute banana.
     */
    public function it_tries_to_get_value_from_an_unrecognized_attribute()
    {
        $transactionReference = new TransactionReference();
        $banana = $transactionReference->banana;
    }

    /**
     * @test Gets value with uppercase attribute for first letter.
     */
    public function it_gets_value_with_uppercase_attribute_for_first_letter()
    {
        $transactionReference = new TransactionReference();
        $transactionReference->customerContext = 'Thing';

        $thing = $transactionReference->CustomerContext;

        $this->assertEquals('Thing', $thing);
    }
}
