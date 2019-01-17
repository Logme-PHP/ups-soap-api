<?php

namespace Logme\Soap\Ups;

class TransactionReference extends AbstractModel
{
    /**
     * May be used to synchronize request/response pairs.
     * Information request element is echoed back in response.
     * Must contain valid XML.
     *
     * @var string
     */
    protected $customerContext;

    /**
     * Sets the customer context attribute with value.
     *
     * @param string $value
     *
     * @throws \Exception
     */
    protected function setCustomerContext($value)
    {
        if (strlen($value) > 512) {
            throw new \Exception('The string length of customer context must be less or equal to 512.');
        }

        $this->customerContext = $value;
    }
}
