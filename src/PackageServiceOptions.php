<?php

namespace Logme\Soap\Ups;

class PackageServiceOptions extends AbstractModel
{
    /**
     * Delivery confirmation instance.
     *
     * @var DeliveryConfirmation
     */
    protected $deliveryConfirmation;

    /**
     * Access Point COD indicates Package COD is requested for a shipment.
     * Valid only for:
     * 01 - Hold For Pickup At UPS Access Point, Shipment Indication type.
     *
     * Package Access Point COD is valid only for shipment without return service from US/PR to US/PR and CA to CA.
     * Not valid with (Package) COD.
     *
     * @var Currency
     */
    protected $accessPointCOD;

    /**
     * COD container instance.
     * Indicates COD is requested.
     * Vald for the following country or territory combinations:
     * US/PR to US/PR
     * CA to CA
     * CA to US
     * Not allowed for CA to US for packages that are designated as Letters or Envelopes.
     *
     * @var CashOnDelivery
     */
    protected $COD;

    /**
     * Declared value container.
     *
     * @var Currency
     */
    protected $declaredValue;

    /**
     * Shipper paid declared value charge at package level.
     * Valid for UPS World Wide Express Freight shipments.
     *
     * @var Currency
     */
    protected $shipperDeclaredValue;

    /**
     * If package, the package is rated for UPS Proactive Response and proactive package tracking.
     * Contractual accessorial for health care companies to allow package monitoring throughtout the UPS system.
     * Shippers account needs to have valid contract for UPS Proactive Response.
     *
     * @var bool
     */
    protected $proactiveIndicator = false;

    /**
     * Presence/Absenvce indicator.
     * Any value is ignored. If present, indicates that the package contains ant item that needs refrigeration.
     * Shippers account needs to have a valid contract for Refrigeration.
     *
     * @var bool
     */
    protected $refrigerationIndicator = false;

    /**
     * Insurance Accessorial.
     * Only one type of insurance can exist at a time on the shipment.
     * Valid for UPS World Wide Express Freight shipments.
     *
     * @var Insurance
     */
    protected $insurance;

    /**
     * A flag indicating if the packages require verbal confirmation.
     *
     * @var bool
     */
    protected $verbalConfirmationIndicator = false;

    /**
     * Indicates special handling is required for shipment having controller substances.
     * Valid only for CA to CA movements
     *
     * Available for following return services:
     * Returns Exchange (available with a contract)
     * Print Return Label Print and Mail Electronic Return Label
     * Return Service Three Attempt
     *
     * May be requested with following UPS services:
     * UPS Express Early
     * UPS Express
     * UPS Express Saver
     * UPS Standard
     *
     * Not available for packages with the following:
     * Delivery Confirmation - Signature Required
     * Delivery Confirmation - Adult Signature Required
     *
     * @var bool
     */
    protected $UPSPremiumCareIndicator = false;

    /**
     * Container to hold HazMat information.
     * Applies only if SubVersion is greater than or equal to 1701.
     *
     * @var HazMat
     */
    protected $hazMat;

    /**
     * Create a new package service options instance.
     */
    public function __construct()
    {
        $this->deliveryConfirmation = new DeliveryConfirmation();
        $this->accessPointCOD = new Currency();
        $this->COD = new CashOnDelivery();
        $this->declaredValue = new Currency();
        $this->shipperDeclaredValue = new Currency();
        $this->insurance = new Insurance();
        $this->hazMat = new HazMat();
    }

    /**
     * Sets delivery confirmation attribute.
     *
     * @param DeliveryConfirmation $value
     */
    public function setDeliveryConfirmation(DeliveryConfirmation $value)
    {
        $this->deliveryConfirmation = $value;
    }

    /**
     * Sets access point COD attribute.
     *
     * @param Currency $value
     */
    public function setAccessPointCOD(Currency $value)
    {
        $this->accessPointCOD = $value;
    }

    /**
     * Sets the COD attribute.
     *
     * @param CashOnDelivery $value
     */
    public function setCOD(CashOnDelivery $value)
    {
        $this->COD = $value;
    }

    /**
     * Sets the declared value attribute.
     *
     * @param Currency $value
     */
    public function setDeclaredValue(Currency $value)
    {
        $this->declaredValue = $value;
    }

    /**
     * Sets the shipper declared value attribute.
     *
     * @param Currency $value
     */
    public function setShipperDeclaredValue(Currency $value)
    {
        $this->shipperDeclaredValue = $value;
    }

    /**
     * Sets the proactive indicator attribute.
     *
     * @param bool $value
     * @throws Exception
     */
    public function setProactiveIndicator($value)
    {
        if (!is_bool($value)) {
            throw new \Exception("Cannot set the proactive indicator without a boolean type value.");
        }

        $this->proactiveIndicator = $value;
    }

    /**
     * Sets the refrigeration indicator.
     *
     * @param bool $value
     * @throws Exception
     */
    public function setRefrigerationIndicator($value)
    {
        if (!is_bool($value)) {
            throw new \Exception("Cannot set the refrigeration indicator without a boolean type value.");
        }

        $this->refrigerationIndicator = $value;
    }

    /**
     * Sets the insurance container.
     *
     * @var Insurance $value
     */
    public function setInsurance(Insurance $value)
    {
        $this->insurance = $value;
    }

    /**
     * Sets the verbal confirmation indicator.
     *
     * @param bool $value
     * @throws Exception
     */
    public function setVerbalConfirmationIndicator($value)
    {
        if (!is_bool($value)) {
            throw new \Exception("Cannot set the verbal confirmation indicator without a boolean type value.");
        }

        $this->verbalConfirmationIndicator = $value;
    }

    /**
     * Sets the UPS premium care indicator.
     *
     * @param bool $value
     * @throws Exception
     */
    public function setUPSPremiumCareIndicator($value)
    {
        if (!is_bool($value)) {
            throw new \Exception("Cannot set the UPS Premium care indicator a boolean type value.");
        }

        $this->UPSPremiumCareIndicator = $value;
    }
}
