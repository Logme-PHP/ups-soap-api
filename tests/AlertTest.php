<?php

namespace Logme\Soap\Ups;

use PHPUnit\Framework\TestCase;

class AlertTest extends TestCase
{
    /**
     * @test Sets the code value.
     */
    public function it_sets_the_code_value()
    {
        $alert = new Alert();
        $alert->code = '123456789';

        $this->assertEquals('123456789', $alert->code);
    }

    /**
     * @test Tries to set the code with a string length greater than 10.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of code must be between 1 and 10.
     */
    public function it_tries_to_set_the_code_with_a_string_length_greater_than_10()
    {
        $alert = new Alert();
        $alert->code = '12345678900';
    }

    /**
     * @test Sets the description value.
     */
    public function it_sets_the_description_value()
    {
        $alert = new Alert();
        $alert->description = 'A warning';

        $this->assertEquals('A warning', $alert->description);
    }

    /**
     * @test Tries to set the description value with a string length greater than 150
     * @expectedException Exception
     * @expectedExceptionMessage The string length of description must be between 1 and 150.
     */
    public function it_tries_to_set_the_description_value_with_a_string_length_greater_than_150()
    {
        $alert = new Alert();
        $str = str_repeat('a', 151);
        $alert->description = $str;
    }
}
