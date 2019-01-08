<?php

namespace Logme\Soap\Ups\Track;

use Logme\Soap\Ups\AbstractModel;
use PHPUnit\Framework\MockObject\Stub\Exception;

/**
 * Container for the root Track Request.
 * Package, Mail Innovations and freight shipment can be tracked by invoking this request.
 * Users have three ways to track, by inquiry number, by reference number or by candidate bookmark.
 * Candidate bookmark applies to Freight tracking only.
 */
class TrackRequest extends AbstractModel
{
    const ENTITY_WITH_MORE_TRACKABLE_ENTITIES = "01";
    const ENTITY_WITH_NO_MORE_TRACKABLE_ENTITIES = "02";
    const MAIL_INNOVATIONS = "03";

    /**
     * Common request element should be provided by users.
     * 
     * @var Request
     */
    protected $request;

    /**
     * Inquiry Number.
     * 
     * Package:
     * For package, the number will be treated as Shipment Identification Number of 
     * package Tracking Number based on the value of the element TrackingOption.
     * 
     * Tracking options:
     * 01 - the inquiry number will be treated as shipment identification number.
     * 02 - the inquiry number will be treated as package Tracking number.
     * 
     * Freight:
     * For freight, the number will be always treated as the tracking number of the
     * shipment regardless of the value of the TrackingOption.
     * 
     * Mail Innovations:
     * For mail innovations this number will be tracking number. When tracking for mail
     * innovations by tracking number the TrackingOption also needs to be set to 03.
     * For mail innovations different types of tracking numbers apply like - Sequence
     * number (Mail Manifest ID / MMS), Postal service Tracking ID.
     * 
     * @var string
     */
    protected $inquiryNumber;

    /**
     * Mail innovation indicator.
     * The presence of the this indicator means supports Mail Innovation tracking
     * without tracking option.
     * Only applies to Mail Innovations.
     * 
     * @var bool 
     */
    protected $includeMailInnovationIndicator;

    /**
     * Tracking Option.
     * Only applies to Package and Mail Innovations only.
     * 
     * Package:
     * 01 - Single trackable entity with more trackable entities inside it.
     * 02 - Single trackable entity with no more trackable entities inside it.
     * If value or element is not found, then Inquiry Number will be treated as Shipment
     * Identification Number.
     * If the TrackingOption is not present the it will return all packages information
     * if it is a Multi-package shipment (Which means Tracking number will be treated as
     * Shipment Identification number).
     * 
     * Freight:
     * For Freight, this element will be ignored and the inquiry number will always be 
     * treated as Shipment Identification Number.
     * For Freight Inquiry Number this field will not be used so all the information about
     * that freight shipment will be returned.
     * 
     * Mail Innovations:
     * For Mail Innovations track by number, this is a mandatory field which has to be set
     * to 03. For Mail Innovations a single shipment has single package.
     */
    protected $trackingOption;

    /**
     * Set the inquiry number value.
     * 
     * @param string $value
     * @throws \Exception
     */
    protected function setInquiryNumber($value)
    {
        if (strlen($value) < 9 || strlen($value) > 34) {
            throw new \Exception("The string length of inquiry number must be between 9 and 34.");
        }

        $this->inquiryNumber = $value;
    }

    /**
     * Set the tracking option value.
     *
     * Valid Values:
     * 01 - Single trackable entity with more trackable entities inside it
     * 02 - Single trackable entity with no more trackable entities inside it
     * 03 - Mail Innovations
     * 
     * Request option only applies for .
     *
     * @param string $value
     * @throws \Exception
     */
    protected function setTrackingOption($value)
    {
        switch ($value) {
            case self::ENTITY_WITH_MORE_TRACKABLE_ENTITIES:
            case self::ENTITY_WITH_NO_MORE_TRACKABLE_ENTITIES:
            case self::MAIL_INNOVATIONS:
                $this->trackingOption = $value;
                break;
            default:
                throw new \Exception("Cannot set an invalid tracking option value.");
        }
    }
}
