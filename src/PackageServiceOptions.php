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
     * Create a new package service options instance.
     */
    public function __construct()
    {
        $this->deliveryConfirmation = new DeliveryConfirmation();
        $this->accessPointCOD = new Currency();
        $this->COD = new CashOnDelivery();
        $this->declaredValue = new Currency();
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
}
