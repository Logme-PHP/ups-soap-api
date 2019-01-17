<?php

namespace Logme\Soap\Ups\Track;

use Logme\Soap\Ups\AbstractModel;
use Logme\Soap\Ups\Response;
use Logme\Soap\Ups\Shipment;

/**
 * Container for root Track Response.
 */
class TrackResponse extends AbstractModel
{
    /**
     * Container for common Response element.
     *
     * @var Response
     */
    protected $response;

    /**
     * Shipment container instance.
     *
     * @var array
     */
    protected $shipment;

    /**
     * Set the response container.
     *
     * @param Response $value
     */
    protected function setResponse(Response $value)
    {
        $this->response = $value;
    }

    /**
     * Set the shipment container.
     *
     * @param Shipment $value
     */
    protected function setShipment(array $value)
    {
        $this->shipment = $value;
    }
}
