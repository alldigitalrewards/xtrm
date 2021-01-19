<?php

namespace AllDigitalRewards\Xtrm\Entity\Response;

class TransactionDetailResponse extends AbstractEntity
{
    protected $IssuerTransactionId;
    protected $PaymentTransactionId;
    protected $RecipientUserId;
    protected $PaymentDate;
    protected $PaymentStatus;
    protected $Amount;
    protected $Fee;
    protected $TotalAmount;
    protected $Currency;

    /**
     * @return mixed
     */
    public function getIssuerTransactionId()
    {
        return $this->IssuerTransactionId;
    }

    /**
     * @param mixed $IssuerTransactionId
     */
    public function setIssuerTransactionId($IssuerTransactionId): void
    {
        $this->IssuerTransactionId = $IssuerTransactionId;
    }

    /**
     * @return mixed
     */
    public function getPaymentTransactionId()
    {
        return $this->PaymentTransactionId;
    }

    /**
     * @param mixed $PaymentTransactionId
     */
    public function setPaymentTransactionId($PaymentTransactionId): void
    {
        $this->PaymentTransactionId = $PaymentTransactionId;
    }

    /**
     * @return mixed
     */
    public function getRecipientUserId()
    {
        return $this->RecipientUserId;
    }

    /**
     * @param mixed $RecipientUserId
     */
    public function setRecipientUserId($RecipientUserId): void
    {
        $this->RecipientUserId = $RecipientUserId;
    }

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

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->Amount;
    }

    /**
     * @param mixed $Amount
     */
    public function setAmount($Amount): void
    {
        $this->Amount = $Amount;
    }

    /**
     * @return mixed
     */
    public function getFee()
    {
        return $this->Fee;
    }

    /**
     * @param mixed $Fee
     */
    public function setFee($Fee): void
    {
        $this->Fee = $Fee;
    }

    /**
     * @return mixed
     */
    public function getTotalAmount()
    {
        return $this->TotalAmount;
    }

    /**
     * @param mixed $TotalAmount
     */
    public function setTotalAmount($TotalAmount): void
    {
        $this->TotalAmount = $TotalAmount;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->Currency;
    }

    /**
     * @param mixed $Currency
     */
    public function setCurrency($Currency): void
    {
        $this->Currency = $Currency;
    }
}
