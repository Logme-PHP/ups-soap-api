<?php

namespace Tests\Track;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\Response;
use Logme\Soap\Ups\ResponseStatus;
use Logme\Soap\Ups\Track\TrackResponse;

class TrackResponseTest extends TestCase
{
    /**
     * @test Sets the response container.
     */
    public function it_sets_the_response_container()
    {
        $trackResponse = new TrackResponse();
        $trackResponse->response->responseStatus->code = ResponseStatus::SUCCESSFUL;

        $this->assertInstanceOf(Response::class, $trackResponse->response);
        $this->assertEquals('01', $trackResponse->response->responseStatus->code);
    }

    /**
     * 
     */
    public function it_sets_the_shipment_container()
    {

    }
}