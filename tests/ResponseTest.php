<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\Alert;
use Logme\Soap\Ups\Response;
use Logme\Soap\Ups\ResponseStatus;
use Logme\Soap\Ups\TransactionReference;

class ResponseTest extends TestCase
{
    /**
     * @test Sets the transaction reference context.
     */
    public function it_sets_the_transaction_reference_container()
    {
        $response = new Response();
        $response->transactionReference->customerContext = 'This is a test.';

        $this->assertInstanceOf(TransactionReference::class, $response->transactionReference);
        $this->assertEquals('This is a test.', $response->transactionReference->customerContext);

        $transactionReference = new TransactionReference();
        $transactionReference->customerContext = 'This is another test.';
        $response->transactionReference = $transactionReference;

        $this->assertInstanceOf(TransactionReference::class, $response->transactionReference);
        $this->assertEquals('This is another test.', $response->transactionReference->customerContext);
    }

    /**
     * @test Sets the response status container.
     */
    public function it_sets_the_response_status_container()
    {
        $response = new Response();
        $response->responseStatus->code = ResponseStatus::SUCCESSFUL;

        $this->assertInstanceOf(ResponseStatus::class, $response->responseStatus);
        $this->assertEquals('1', $response->responseStatus->code);
        $this->assertEquals('Successful', $response->responseStatus->description);

        $responseStatus = new ResponseStatus();
        $responseStatus->code = ResponseStatus::FAILURE;
        $response->responseStatus = $responseStatus;

        $this->assertInstanceOf(ResponseStatus::class, $response->responseStatus);
        $this->assertEquals('0', $response->responseStatus->code);
        $this->assertEquals('Failure', $response->responseStatus->description);
    }

    /**
     * @test Sets the alert array with alert containers.
     */
    public function it_sets_the_alert_array_with_alert_containers()
    {
        $response = new Response();
        $alerts = [
            new Alert(),
            new Alert(),
        ];
        $response->alert = $alerts;

        $this->assertCount(2, $response->alert);
    }

    /**
     * @test Tries to set alert array without alert containers.
     * @expectedException Exception
     * @expectedExceptionMessage The elements of alert must be instance of Alert.
     */
    public function it_tries_to_set_alert_array_without_alert_containers()
    {
        $response = new Response();
        $alerts = [
            new Alert(),
            '12345',
        ];
        $response->alert = $alerts;
    }
}
