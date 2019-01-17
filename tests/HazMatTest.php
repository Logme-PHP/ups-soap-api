<?php

namespace tests;

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
     * @test Sets the defaults attributes values.
     */
    public function it_sets_the_defaults_attributes_values()
    {
        $this->assertFalse($this->hazMat->overPackedIndicator);
    }

    /**
     * @test Sets the package identifier attribute.
     */
    public function it_sets_the_package_identifier_attribute()
    {
        $this->hazMat->packageIdentifier = '1234';

        $this->assertEquals('1234', $this->hazMat->packageIdentifier);
    }

    /**
     * @test Tries to set the package identifier with string greater than 5.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of package identifier must be between 1 and 5.
     */
    public function it_tries_to_set_the_package_identifier_with_string_greater_than_5()
    {
        $this->hazMat->packageIdentifier = '123456';
    }

    /**
     * @test Sets the QValue attribute.
     */
    public function it_sets_the_QValue_attribute()
    {
        $this->hazMat->QValue = '0.1';

        $this->assertEquals('0.1', $this->hazMat->QValue);
    }

    /**
     * @test Tries to set the QValue with an unexpected value.
     * @expectedException Exception
     * @expectedExceptionMessage Cannot set QValue with an unexpected value.
     */
    public function it_tries_to_set_the_QValue_with_an_unexpected_value()
    {
        $this->hazMat->QValue = '2.0';
    }

    /**
     * @test Sets the over packed indicator attribute.
     */
    public function it_sets_the_over_packed_indicator_attribute()
    {
        $this->hazMat->overPackedIndicator = true;

        $this->assertTrue($this->hazMat->overPackedIndicator);
    }

    /**
     * @test Tries to set over packed indicator without a boolean type value.
     * @expectedException Exception
     * @expectedExceptionMessage The over packed indicator only accepts boolean type values.
     */
    public function it_tries_to_set_over_packed_indicator_without_a_boolean_type_value()
    {
        $this->hazMat->overPackedIndicator = 'string';
    }

    /**
     * @test Sets the all packed in one indicator attribute.
     */
    public function it_sets_all_packed_in_one_indicator_attribute()
    {
        $this->hazMat->allPackedInOneIndicator = true;

        $this->assertTrue($this->hazMat->allPackedInOneIndicator);
    }

    /**
     * @test Tries to set packed in one indicator without a boolean type value.
     * @expectedException Exception
     * @expectedExceptionMessage The all packed in one indicator only accepts boolean type values.
     */
    public function it_tries_to_set_all_packed_in_one_indicator_without_a_boolean_type_value()
    {
        $this->hazMat->allPackedInOneIndicator = 'string';
    }
}
