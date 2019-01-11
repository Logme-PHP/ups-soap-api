<?php

namespace Logme\Soap\Ups;

class PickupDateRange extends AbstractModel
{
    /**
     * Begin date.
     * The beginning pickup date used to narrow a reference number search.
     * Format: YYYYMMDD. MM ranges from 01 to 12.
     * 
     * @var string
     */
    protected $beginDate;

    /**
     * End date.
     * The end pickup date used to narrow a reference number search.
     * Format: YYYYMMDD. MM ranges from 01 to 12.
     */
    protected $endDate;

    /**
     * Sets the begin date value.
     * 
     * @param string $value
     * @throws Exception
     */
    protected function setBeginDate($value)
    {
        if (strlen($value) != 8) {
            throw new \Exception("The string length of begin date must be equals to 8.");
        }

        if (!$this->isValidDateFormat($value)) {
            throw new \Exception("The begin date string needs to be a valid date formatted has YYYYMMDD.");
        }

        $this->beginDate = $value;
    }

    /**
     * Sets the end date value.
     * 
     * @param string $value
     */
    protected function setEndDate($value)
    {
        if (strlen($value) != 8) {
            throw new \Exception("The string length of end date must be equals to 8.");
        }

        if (!$this->isValidDateFormat($value)) {
            throw new \Exception("The end date string needs to be a valid date formatted has YYYYMMDD.");
        }

        $this->endDate = $value;
    }

    /**
     * Validate if the date format is YYYYMMDD.
     * 
     * @param string $date
     * @return bool
     */
    private function isValidDateFormat($date)
    {
        $year = intval(substr($date, 0, 4));
        $month = intval(substr($date, 4, 2));
        $day = intval(substr($date, -2));

        return checkdate($month, $day, $year);
    }
}
