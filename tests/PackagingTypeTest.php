<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\PackagingType;

class PackagingTypeTest extends TestCase
{
    /**
     * @test Sets the code for the packaging type.
     */
    public function it_sets_the_code_for_the_packaging_type()
    {
        $packagingType = new PackagingType();
        $packagingType->code = "00";

        $this->assertEquals("00", $packagingType->code);
        $this->assertEquals("UNKNOWN", $packagingType->description);
    }

    /**
     * @test Tries to set the code with an unexpected value.
     * @expectedException Exception
     * @expectedExceptionMessage Cannot set an invalid code value.
     */
    public function it_tries_to_set_the_code_with_an_unexpected_value()
    {
        $packagingType = new PackagingType();
        $packagingType->code = "KO";
    }
}
