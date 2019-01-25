<?php

namespace Logme\Soap\Ups\Track;

use Logme\Soap\Ups\AbstractModel;
use Logme\Soap\Ups\Service;
use Logme\Soap\Ups\ReferenceNumber;

/**
 * Tracking shipment container.
 */
class Shipment extends AbstractModel
{
    /**
     * Shipment inquiry number container.
     *
     * @var InquiryNumber
     */
    protected $inquiryNumber;

    /**
     * Container for the type of Shipment.
     *
     * @var ShipmentType
     */
    protected $shipmentType;

    /**
     * Candidate Bookmark.
     * During Tracking and Reference Number searches, it is possible that duplicate shipments will be found.
     * If duplicate shipments are found, then a Candidate Summary with a corresponding Base64 encodedCandidate Bookmark,
     * for each of the Shipments will be returned in the response.
     * The Candidate Bookmark can be passed back to the tracking web service in a separate track transaction to retrieve
     * tracking information about the particular shipment of interest.
     *
     * Only applies to Freight shipments.
     *
     * @var string
     */
    protected $candidateBookmark;

    /**
     * The shippers UPS account number that placed this shipment.
     * Only applies to Package and Mail Innovations shipments.
     *
     * @var string
     */
    protected $shipperNumber;

    /**
     * An array of addresses associated with the shipment.
     *
     * @var array
     */
    protected $shipmentAddress = [];

    /**
     * Shipment weight container.
     * 
     * @var ShipmentWeight;
     */
    protected $shipmentWeight;

    /**
     * Container for UPS service associated with shipment.
     * 
     * @var Service
     */
    protected $service;

    /**
     * An array of shipment reference number containers.
     * 
     * @var array
     */
    protected $referenceNumber = [];

    /**
     * Sets the reference number value.
     * 
     * @param ReferenceNumber $value
     */
    protected function setReferenceNumber(array $value)
    {
        $this->referenceNumber = $value;
    }

    /**
     * Sets the service value.
     * 
     * @param Service $value
     */
    protected function setService(Service $value)
    {
        $this->service = $value;
    }

    /**
     * Sets the shipment weight.
     * 
     * @param ShipmentWeight $value
     */
    protected function setShipmentWeight(ShipmentWeight $value)
    {
        $this->shipmentWeight = $value;
    }

    /**
     * Sets the shipment address array with shipment address container.
     *
     * @var array
     */
    protected function setShipmentAddress(array $value)
    {
        $this->shipmentAddress = $value;
    }

    /**
     * Sets the shipper number value.
     *
     * @param string $value
     *
     * @throws Exception
     */
    protected function setShipperNumber($value)
    {
        if (strlen($value) < 6 || strlen($value) > 10) {
            throw new \Exception('The shipper number must be a string with length between 6 and 10.');
        }

        $this->shipperNumber = $value;
    }

    /**
     * Sets the candidate bookmark value.
     *
     * @param string $value
     *
     * @throws Exception
     */
    protected function setCandidateBookmark($value)
    {
        if (strlen($value) < 1 || strlen($value) > 15) {
            throw new \Exception('The candidate bookmark must be a string with a length between 1 and 15.');
        }

        $this->candidateBookmark = $value;
    }
}
