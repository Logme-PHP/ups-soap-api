<?php

namespace Logme\Soap\Ups;

use Logme\Soap\Ups\TransactionReference;

class Request extends AbstractModel
{
    const RATE = "Rate";
    const SHOP = "Shop";
    const RATE_TIME_IN_TRANSIT = "Ratetimeintransit";
    const SHOP_TIME_IN_TRANSIT = "Shoptimeintransit";

    const SUBVERSION_1601 = "1601";
    const SUBVERSION_1607 = "1607";
    const SUBVERSION_1701 = "1701";
    const SUBVERSION_1801 = "1801";

    /**
     * Used to define the request type.
     *
     * @var string
     */
    protected $requestOption;

    /**
     * Indicates Rate API to display the new release features in Rate API response based on Rate release.
     * Supported values: 1601, 1607, 1701, 1801
     *
     * @var string
     */
    protected $subVersion;

    /**
     * Transaction reference identifies transactions between client and server.
     *
     * @var TransactionReference
     */
    protected $transactionReference;

    /**
     * Create a new Request instance.
     */
    public function __construct()
    {
        $this->requestOption = self::RATE;
        $this->subVersion = null;
        $this->transactionReference = new TransactionReference();
    }

    /**
     * Set the request option value.
     *
     * Valid Values:
     * Rate = The server rates (The default Request option is Rate if a Request Option is not provided).
     * Shop = The server validates the shipment, and returns rates for all UPS products from the ShipFrom to ShipTo addresses.
     * Ratetimeintransit = The server rates with transit time information.
     * Shoptimeintransit = The server validates the shipment, and transit times for all UPS products from the ShipFrom to ShipTo addresses.
     *
     * Rate is the only valid request option for UPS Ground Freight Pricing requests.
     *
     * @param string $value
     * @throws \Exception
     */
    public function setRequestOption($value)
    {
        switch ($value) {
            case self::RATE:
            case self::SHOP:
            case self::RATE_TIME_IN_TRANSIT:
            case self::SHOP_TIME_IN_TRANSIT:
                $this->requestOption = $value;
                break;
            default:
                throw new \Exception("Cannot set an invalid request option value.");
        }
    }

    /**
     * Set the sub version value.
     * Supported values: 1601, 1607, 1701, 1801.
     *
     * @param string $value
     * @throws \Exception
     */
    public function setSubVersion($value)
    {
        switch ($value) {
            case self::SUBVERSION_1601:
            case self::SUBVERSION_1607:
            case self::SUBVERSION_1701:
            case self::SUBVERSION_1801:
                $this->subVersion = $value;
                break;
            default:
                throw new \Exception("The requested sub version is not supported.");
        }
    }

    /**
     * Sets the transaction reference to identify the customer transaction.
     *
     * @param TransactionReference $value
     */
    public function setTransactionReference(TransactionReference $value)
    {
        $this->transactionReference = $value;
    }
}
