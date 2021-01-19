<?php

namespace AllDigitalRewards\Xtrm\Entity\Response;

class UserWithdrawFundResultResponse extends AbstractEntity
{
    protected $PaymentDate;
    protected $PaymentStatus;

    /**
     * @return mixed
     */
    public function getPaymentDate()
    {
        return $this->PaymentDate;
    }

    /**
     * @param mixed $PaymentDate
     */
    public function setPaymentDate($PaymentDate): void
    {
        $this->PaymentDate = $PaymentDate;
    }

    /**
     * @return mixed
     */
    public function getPaymentStatus()
    {
        return $this->PaymentStatus;
    }

    /**
     * @param mixed $PaymentStatus
     */
    public function setPaymentStatus($PaymentStatus): void
    {
        $this->PaymentStatus = $PaymentStatus;
    }
}
