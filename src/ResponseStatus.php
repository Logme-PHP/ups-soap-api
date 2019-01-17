<?php

namespace Logme\Soap\Ups;

class ResponseStatus extends AbstractType
{
    const SUCCESSFUL = '1';
    const FAILURE = '0';

    /**
     * List of descriptions for Response status.
     *
     * 1 - Successful
     * 2 - Failure
     *
     * @var array
     */
    protected $descriptions = [
        self::FAILURE => 'Failure',
        self::SUCCESSFUL => 'Successful',
    ];
}
