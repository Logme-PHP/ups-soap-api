<?php

namespace Logme\Soap\Ups;

/**
 * Shipment Inquiry number container.
 */
class InquiryNumber extends AbstractType
{
    const SHIPMENT_IDENTIFICATION_NUMBER = '01';
    const MAIL_INNOVATION_TRACKING_NUMBER = '03';
    const HOUSE_AIRWAY_BILL = 'HAWB';
    const HOUSE_BILL_OF_LADING = 'HBL';
    const PRO_NUMBER = 'PRO';
    const SUB_PRO_NUMBER = 'SUBPRO';
    const DELIVERY_ORDER = 'DO';

    /**
     * List with descriptions for type code.
     *
     * @var array
     */
    protected $descriptions = [
        self::SHIPMENT_IDENTIFICATION_NUMBER => 'Shipment Identification Number',
        self::MAIL_INNOVATION_TRACKING_NUMBER => 'Mail Innovation tracking number',
        self::HOUSE_AIRWAY_BILL => 'House Airway Bill',
        self::HOUSE_BILL_OF_LADING => 'House Bill of Lading',
        self::PRO_NUMBER => 'Pro Number',
        self::SUB_PRO_NUMBER => 'Sub-Pro Number',
        self::DELIVERY_ORDER => 'Delivery Order',
    ];

    /**
     * Value of the Inquiry Number.
     *
     * @var string
     */
    protected $value;

    /**
     * Sets the value field.
     *
     * @param string value
     *
     * @throws Exception
     */
    protected function setValue($value)
    {
        if (strlen($value) < 1 || strlen($value) > 34) {
            throw new \Exception('The string length of value needs to be between 1 and 34.');
        }

        $this->value = $value;
    }
}
