<?php

class Fee
{
    protected $date;
    protected $arbitraryAmount;
    protected $percentage;
    protected $feeAmount;


    /**
     * Get the value of date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of arbitraryAmount
     */
    public function getArbitraryAmount()
    {
        return $this->arbitraryAmount;
    }

    /**
     * Set the value of arbitraryAmount
     *
     * @return  self
     */
    public function setArbitraryAmount($arbitraryAmount)
    {
        $this->arbitraryAmount = $arbitraryAmount;

        return $this;
    }

    /**
     * Get the value of percentage
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * Set the value of percentage
     *
     * @return  self
     */
    public function setPercentage($percentage)
    {
        $this->percentage = $percentage;

        return $this;
    }

    /**
     * Get the value of feeAmount
     */
    public function getFeeAmount()
    {
        return $this->feeAmount;
    }

    /**
     * Set the value of feeAmount
     *
     * @return  self
     */
    public function setFeeAmount($feeAmount)
    {
        $this->feeAmount = $feeAmount;

        return $this;
    }

    public function insert()
    {
        // Connect to DB
        // Insert Query using SQL "INSERT INTO..."
    }
}
