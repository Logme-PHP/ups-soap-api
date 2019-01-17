<?php

namespace Logme\Soap\Ups;

/**
 * Container for common Response element.
 */
class Response extends AbstractModel
{
    /**
     * Response Status container.
     *
     * @var ResponseStatus
     */
    protected $responseStatus;

    /**
     * Alert container.
     * There can be zero to many alert containers with code and description.
     *
     * @var array;
     */
    protected $alert = [];

    /**
     * Transaction reference container.
     *
     * @var TransactionReference
     */
    protected $transactionReference;

    /**
     * Create a new Response instance.
     */
    public function __construct()
    {
        $this->responseStatus = new ResponseStatus();
        $this->transactionReference = new TransactionReference();
    }

    /**
     * Set the response status container.
     *
     * @param ResponseStatus $value
     */
    protected function setResponseStatus(ResponseStatus $value)
    {
        $this->responseStatus = $value;
    }

    /**
     * Set the transaction reference container.
     *
     * @param TransactionReference
     */
    protected function setTransactionReference(TransactionReference $value)
    {
        $this->transactionReference = $value;
    }

    /**
     * Set the alert array with alert containers.
     *
     * @param array $value
     *
     * @throws Exception
     */
    protected function setAlert(array $value)
    {
        foreach ($value as $v) {
            if (!$v instanceof Alert) {
                throw new \Exception('The elements of alert must be instance of Alert.');
            }
        }

        $this->alert = $value;
    }
}
