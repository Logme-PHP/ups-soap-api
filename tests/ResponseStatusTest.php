<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\ResponseStatus;

class ResponseStatusTest extends TestCase
{
    /**
     * @test Sets the response status code.
     */
    public function it_sets_the_response_status_code()
    {
        $responseStatus = new ResponseStatus();
        $responseStatus->code = $responseStatus::SUCCESSFUL;

        $this->assertEquals('1', $responseStatus->code);
        $this->assertEquals('Successful', $responseStatus->description);
    }

    /**
     * @test Sets response status with a invalid value.
     */
    public function it_tries_to_set_response_status_with_a_invalid_value()
    {
        $responseStatus = new ResponseStatus();
        $responseStatus->code = '2';

        $this->assertEquals('2', $responseStatus->code);
        $this->assertEquals('Unknown code', $responseStatus->description);
    }
}
