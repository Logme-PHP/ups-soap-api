<?php

namespace Logme\Soap\Ups;

class Address extends AbstractModel
{
    /**
     * Street address including name and number (when applicable).
     * Maximum Occurrence should be three.
     *
     * @var array
     */
    protected $addressLine = [];

    /**
     * Name of the city.
     * Required if country or territory does not utilize postal codes.
     *
     * @var string
     */
    protected $city;

    /**
     * Address state code.
     *
     * @var string
     */
    protected $stateProvinceCode;

    /**
     * Address postal code.
     *
     * @var string
     */
    protected $postalCode;

    /**
     * Address country or territory code.
     *
     * @var string
     */
    protected $countryCode;

    /**
     * Residential address flag.
     * This field is a flag to indicate if the destination is a residential location.
     * Is false by default.
     *
     * @var bool
     */
    protected $residentialAddressIndicator = false;

    /**
     * Sets address line string to array.
     *
     * @param mixed $value
     *
     * @throws \Exception
     */
    public function setAddressLine($value)
    {
        $actual = $this->addressLine;

        $values = is_array($value) ? $value : [$value];

        if (count($values) === 0) {
            $this->addressLine = [];
        }

        $elements = count($values) + count($this->addressLine);

        if ($elements > 3) {
            throw new \Exception('The maximum size of address line array are 3 elements.');
        }

        foreach ($values as $v) {
            if (strlen($v) > 35) {
                $this->addressLine = $actual;
                throw new \Exception('The string length of address line must be less or equal to 35.');
            }
            array_push($this->addressLine, $v);
        }
    }

    /**
     * Sets the name of the city.
     *
     * @param string $value
     *
     * @throws \Exception
     */
    public function setCity($value)
    {
        if (strlen($value) > 30) {
            throw new \Exception('The string length of city must be less or equal to 30.');
        }

        $this->city = $value;
    }

    /**
     * Sets the state province code of address.
     *
     * @param string $value
     *
     * @throws \Exception
     */
    public function setStateProvinceCode($value)
    {
        if (strlen($value) > 2) {
            throw new \Exception('The string length of state province code must be less or equal to 2.');
        }

        $this->stateProvinceCode = $value;
    }

    /**
     * Sets the postal code of the addres.
     *
     * @param string $value
     *
     * @throws \Exception
     */
    public function setPostalCode($value)
    {
        if (strlen($value) > 9) {
            throw new \Exception('The string length of postal code must be less or equal to 9.');
        }

        $this->postalCode = $value;
    }

    /**
     * Sets country code of the address.
     *
     * @param string $value
     *
     * @throws \Exception
     */
    public function setCountryCode($value)
    {
        if (strlen($value) !== 2) {
            throw new \Exception('The string length of country code must be equal to 2.');
        }

        $this->countryCode = $value;
    }

    /**
     * Set residential address indicator.
     *
     * @param bool $value
     *
     * @throws \Exception
     */
    public function setResidentialAddressIndicator($value)
    {
        if (!is_bool($value)) {
            throw new \Exception('The residential address indicator expects a boolean value.');
        }

        $this->residentialAddressIndicator = $value;
    }
}
