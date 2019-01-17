<?php

namespace Logme\Soap\Ups\Track;

use Logme\Soap\Ups\AbstractModel;
use Logme\Soap\Ups\ReferenceNumber;
use Logme\Soap\Ups\Request;
use Logme\Soap\Ups\PickupDateRange;
use Exception;

/**
 * Container for the root Track Request.
 * Package, Mail Innovations and freight shipment can be tracked by invoking this request.
 * Users have three ways to track, by inquiry number, by reference number or by candidate bookmark.
 * Candidate bookmark applies to Freight tracking only.
 */
class TrackRequest extends AbstractModel
{
    const ENTITY_WITH_MORE_TRACKABLE_ENTITIES = '01';
    const ENTITY_WITH_NO_MORE_TRACKABLE_ENTITIES = '02';
    const MAIL_INNOVATIONS = '03';

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
     * Only applies to Package and Mail Innovations.
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
     *
     * @var string
     */
    protected $trackingOption;

    /**
     * Candidate Bookmark.
     * During InquiryNumber and Reference Number searches, it is possible that duplicate
     * shipments will be found. If the duplicate shipments are found, then a Candidate
     * Summary with a corresponding CandidateBookmark for each of the Shipments will be
     * returned in the track response.
     * This Base64 encoded CandidateBookmark can be passed back to the Tracking service
     * in a separate request to retrieve tracking information about the particular shipment
     * of interest. It does not apply to package tracking or Mail Innovations.
     *
     * Only applies to Freight shipments.
     *
     * @var string
     */
    protected $candidateBookmark;

    /**
     * Reference Number.
     * Required if an inquiry number or candidate bookmark is not present.
     * The reference number for Mail Innovations needs to be set here along with appropriate
     * code in ShipmentType.
     *
     * Only applies to Package and Mail Innovations Shipments.
     *
     * @var ReferenceNumber
     */
    protected $referenceNumber;

    /**
     * Pickup date range.
     * The additional information of pickup date range to support and narrow a reference number search.
     * For Mail Innovations this is optional field for tracking by reference number.
     *
     * @var PickupDateRange
     */
    protected $pickupDateRange;

    /**
     * Create a new Track Request instance.
     */
    public function __construct()
    {
        $this->request = new Request();
        $this->referenceNumber = new ReferenceNumber();
        $this->pickupDateRange = new PickupDateRange();
    }

    /**
     * Set the inquiry number value.
     *
     * @param string $value
     *
     * @throws \Exception
     */
    protected function setInquiryNumber($value)
    {
        if (strlen($value) < 9 || strlen($value) > 34) {
            throw new \Exception('The string length of inquiry number must be between 9 and 34.');
        }

        $this->inquiryNumber = $value;
    }

    /**
     * Set the include mail innovations Indicator.
     *
     * @param bool $value
     *
     * @throws \Exception
     */
    protected function setIncludeMailInnovationIndicator($value)
    {
        if (!is_bool($value)) {
            throw new \Exception('The include mail innovation indicator value must be a boolean type.');
        }

        $this->includeMailInnovationIndicator = $value;
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
     *
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
                throw new \Exception('Cannot set an invalid tracking option value.');
        }
    }

    /**
     * Set the candidate bookmark value.
     *
     * @param string $value
     *
     * @throws Exception
     */
    protected function setCandidateBookmark($value)
    {
        if (strlen($value) < 1 || strlen($value) > 15) {
            throw new \Exception('The candidate bookmark value length must be between 1 and 15.');
        }

        $this->candidateBookmark = $value;
    }

    /**
     * Set the Reference number container.
     *
     * @param ReferenceNumber $value
     */
    protected function setReferenceNumber(ReferenceNumber $value)
    {
        $this->referenceNumber = $value;
    }

    /**
     * Set the pickup date range container.
     *
     * @param PickupDateRange
     */
    protected function setPickupDateRange(PickupDateRange $value)
    {
        $this->pickupDateRange = $value;
    }
}
