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
        $transactionReference->customerContext = "Send my identifier number.";

        $this->assertEquals("Send my identifier number.", $transactionReference->customerContext);
    }

    /**
     * @test Tries to set customer context with string greater than 512.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of customer context must be less or equal to 512.
     */
    public function it_tries_to_set_customer_context_context_with_string_greater_than_512()
    {
        $transactionReference = new TransactionReference();
        $str = str_repeat("a", 513);
        $transactionReference->customerContext = $str;
    }
}