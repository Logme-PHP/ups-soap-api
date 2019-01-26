<?php

namespace Tests\Track;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\Response;
use Logme\Soap\Ups\ResponseStatus;
use Logme\Soap\Ups\Track\TrackResponse;
use Logme\Soap\Ups\Track\Shipment;

class TrackResponseTest extends TestCase
{
    /**
     * @test Converts soap response object to track response class.
     */
    public function it_converts_soap_response_object_to_track_response()
    {
        $response = unserialize(file_get_contents(__DIR__.'/SerializeResponse.txt'));
        $trackResponse = new TrackResponse();
        $trackResponse->toObject($response);

        $this->assertInstanceOf(Response::class, $trackResponse->response);
        $this->assertInstanceOf(Shipment::class, $trackResponse->shipment[0]);
    }

    /**
     * @test Converts track response object to array.
     */
    public function it_converts_track_response_object_to_array()
    {
        $response = unserialize(file_get_contents(__DIR__.'/SerializeResponse.txt'));
        $trackResponse = new TrackResponse();
        $trackResponse->toObject($response);

        $array = $trackResponse->toArray();

        $this->assertArrayHasKey('Response', $array);
        $this->assertArrayHasKey('Shipment', $array);
    }

    /**
     * @test Converts track response object to json string.
     */
    public function it_converts_track_response_object_to_json_string()
    {
        $response = unserialize(file_get_contents(__DIR__.'/SerializeResponse.txt'));
        $trackResponse = new TrackResponse();
        $trackResponse->toObject($response);

        $json = $trackResponse->toJson();

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString($json, file_get_contents(__DIR__.'/JsonResponse.txt'));
    }

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
     * @test Sets the shipment container.
     */
    public function it_sets_the_shipment_container()
    {
        $this->assertTrue(true);
    }
}
