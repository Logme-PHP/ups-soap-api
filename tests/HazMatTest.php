<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\HazMat;

class HazMatTest extends TestCase
{
    /**
     * HazMat container instance.
     * 
     * @var HazMat
     */
    protected $hazMat;

    /**
     * Set up the defaults values for all tests.
     */
    public function setUp()
    {
        parent::setUp();
        $this->hazMat = new HazMat();
    }

    /**
     * @test Sets the package identifier attribute.
     */
    public function it_sets_the_package_identifier_attribute()
    {
        $this->hazMat->packageIdentifier = "1234";

        $this->assertEquals("1234", $this->hazMat->packageIdentifier);
    }

    /**
     * @test Tries to set the package identifier with string greater than 5.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of package identifier must be between 1 and 5.
     */
    public function it_tries_to_set_the_package_identifier_with_string_greater_than_5()
    {
        $this->hazMat->packageIdentifier = "123456";
    }

    /**
     * @test Sets the QValue attribute.
     */
    public function it_sets_the_QValue_attribute()
    {
        $this->hazMat->QValue = "0.1";

        $this->assertEquals("0.1", $this->hazMat->QValue);
    }

    /**
     * @test Tries to set the QValue with an unexpected value.
     * @expectedException Exception
     * @expectedExceptionMessage Cannot set QValue with an unexpected value.
     */
    public function it_tries_to_set_the_QValue_with_an_unexpected_value()
    {
        $this->hazMat->QValue = "2.0";
    }
}
