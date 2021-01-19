<?php

namespace AllDigitalRewards\Xtrm\Entity\Response;

class TransferFundToDynamicAccountUserResultResponse extends AbstractEntity
{
    protected $TransactionID;
    protected $Amount;
    protected $Fee;
    protected $TotalAmount;
    protected $Currency;
    protected $RecipientAccountNumber;

    /**
     * @return mixed
     */
    public function getTransactionID()
    {
        return $this->TransactionID;
    }

    /**
     * @param mixed $TransactionID
     */
    public function setTransactionID($TransactionID): void
    {
        $this->TransactionID = $TransactionID;
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

    /**
     * @return mixed
     */
    public function getRecipientAccountNumber()
    {
        return $this->RecipientAccountNumber;
    }

    /**
     * @param mixed $RecipientAccountNumber
     */
    public function setRecipientAccountNumber($RecipientAccountNumber): void
    {
        $this->RecipientAccountNumber = $RecipientAccountNumber;
    }
}
