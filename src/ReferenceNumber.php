<?php

namespace Logme\Soap\Ups;

class ReferenceNumber extends AbstractModel
{
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
     * @throws Exception
     */
    protected function setValue($value)
    {
        if (strlen($value) < 1 || strlen($value) > 35) {
            throw new \Exception("The string length of value must be between 1 and 35.");
        }

        $this->value = $value;
    }
}