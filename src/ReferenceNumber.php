<?php

namespace Logme\Soap\Ups;

class ReferenceNumber extends AbstractType
{
    const UPS_WAYBILL_NUMBER = '13';
    const REFERENCE_NUMBER_16 = '16';
    const REFERENCE_NUMBER_17 = '17';
    const PURCHASE_ORDER_NO = '28';
    const MODEL_NUMBER = '33';
    const PART_NUMBER = '34';
    const SERIAL_NUMBER = '35';
    const DEPARTMENT_NUMBER = '50';
    const STORE_NUMBER = '51';
    const FDA_PRODUCT_CODE = '54';
    const ACCT_REC_CUSTOMER_ACCT = '55';
    const APPROPRIATION_NUMBER = '56';
    const BILL_OF_LADING_NUMBER = '57';
    const EMPLOYER_ID_NUMBER = '58';
    const INVOICE_NUMBER = '59';
    const MANIFEST_KEY_NUMBER = '60';
    const DEALER_ORDER_NUMBER = '61';
    const PRODUCTION_CODE = '62';
    const PURCHASE_REQ_NUMBER = '63';
    const SALESPERSON_NUMBER = '64';
    const SOCIAL_SECURITY_NUMBER = '65';
    const TRANSACTION_REF_NO = '67';
    const RMA = 'RZ';
    const COD_NUMBER = '9V';
    const BILL_OF_LANDING = 'BL';
    const PO_NUMBER = 'PO';
    const USPS_PIC = '91';
    const USPS = '93';
    const MAIL_MANIFEST_SYSTEM_NUMBER = '94';
    const MAIL_MANIFEST_ID = '95';
    const MAIL_INNOVATIONS = '96';

    /**
     * List with descriptions for type code.
     *
     * @var array
     */
    protected $descriptions = [
        self::UPS_WAYBILL_NUMBER => 'UPS Waybill Number',
        self::REFERENCE_NUMBER_16 => 'Reference Number',
        self::REFERENCE_NUMBER_17 => 'Reference Number',
        self::PURCHASE_ORDER_NO => 'Purchase Order No.',
        self::MODEL_NUMBER => 'Model Number',
        self::PART_NUMBER => 'Part Number',
        self::SERIAL_NUMBER => 'Serial Number',
        self::DEPARTMENT_NUMBER => 'Department Number',
        self::STORE_NUMBER => 'Store Number',
        self::FDA_PRODUCT_CODE => 'FDA Product Code',
        self::ACCT_REC_CUSTOMER_ACCT => 'Acct. Rec. Customer Acct.',
        self::APPROPRIATION_NUMBER => 'Appropriation Number',
        self::BILL_OF_LADING_NUMBER => 'Bill of Lading Number',
        self::EMPLOYER_ID_NUMBER => "Employer's ID Number",
        self::INVOICE_NUMBER => 'Invoice Number',
        self::MANIFEST_KEY_NUMBER => 'Manifest Key Number',
        self::DEALER_ORDER_NUMBER => 'Dealer Order Number',
        self::PRODUCTION_CODE => 'Production Code',
        self::PURCHASE_REQ_NUMBER => 'Purchase Req. Number',
        self::SALESPERSON_NUMBER => 'Salesperson Number',
        self::SOCIAL_SECURITY_NUMBER => 'Social Security Number',
        self::TRANSACTION_REF_NO => 'Transaction Ref. No.',
        self::RMA => 'RMA',
        self::COD_NUMBER => 'COD Number',
        self::BILL_OF_LANDING => 'Bill of Lading',
        self::PO_NUMBER => 'PO Number',
        self::USPS_PIC => 'USPS PIC',
        self::USPS => 'USPS (30 char, truncated barcode number)',
        self::MAIL_MANIFEST_SYSTEM_NUMBER => 'Mail Manifest System Number (MMS)',
        self::MAIL_MANIFEST_ID => 'Mail Manifest ID (MMI)',
        self::MAIL_INNOVATIONS => 'Mail Innovations (reference number, customer package id (PID)',
    ];

    protected $code;
    protected $description;

    /**
     * The customer assigned reference number.
     * Only applies to Package and Mail Innovations shipments.
     *
     * @var string
     */
    protected $value;

    /**
     * Sets the value attribute.
     *
     * @param string $value
     *
     * @throws Exception
     */
    protected function setValue($value)
    {
        if (strlen($value) < 1 || strlen($value) > 35) {
            throw new \Exception('The string length of value must be between 1 and 35.');
        }

        $this->value = $value;
    }
}
