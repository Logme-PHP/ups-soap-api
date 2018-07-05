<?php

namespace Logme\Soap\Ups;

class Insurance extends AbstractModel
{
    /**
     * Container to hold basic flexible parcel indicator information.
     * Valid for UPS World Wide Express Freight shipments.
     *
     * @var Currency
     */
    protected $basicFlexibleParcelIndicator;

    /**
     * Container for extended flexible parcel indicator.
     * Valid for UPS World Wide Express shipments.
     *
     * @var Currency
     */
    protected $extendedFlexibleParcelIndicator;

    /**
     * Container to hold time in transit flexbile parcel indicator information.
     * Valid for UPS World Wide Express Freight shipments.
     *
     * @var Currency
     */
    protected $timeInTransitFlexibleParcelIndicator;

    /**
     * Create a new insurance instance.
     */
    public function __construct()
    {
        $this->basicFlexibleParcelIndicator = new Currency();
        $this->extendedFlexibleParcelIndicator = new Currency();
        $this->timeInTransitFlexibleParcelIndicator = new Currency();
    }

    /**
     * Sets the basic flexible parcel indicator attribute.
     *
     * @param Currency $value
     */
    public function setBasicFlexibleParcelIndicator(Currency $value)
    {
        $this->basicFlexibleParcelIndicator = $value;
    }

    /**
     * Sets the extended flexible parcel indicator attribute.
     *
     * @param Currency $value
     */
    public function setExtendedFlexibleParcelIndicator(Currency $value)
    {
        $this->extendedFlexibleParcelIndicator = $value;
    }

    /**
     * Sets the time in transit flexible parcel indicator attribute.
     *
     * @param Currency $value
     */
    public function setTimeInTransitFlexibleParcelIndicator(Currency $value)
    {
        $this->timeInTransitFlexibleParcelIndicator = $value;
    }
}
