<?php

namespace AllDigitalRewards\Xtrm\Entity\Response;

class UserWalletTransactionsResponse extends AbstractEntity
{
    protected $TransactionID;
    protected $CompanyName;
    protected $ProgramName;
    protected $TransactionDate;
    protected $Description;
    protected $Amount;
    protected $Type;
    protected $PaymentMethod;

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
    public function getCompanyName()
    {
        return $this->CompanyName;
    }

    /**
     * @param mixed $CompanyName
     */
    public function setCompanyName($CompanyName): void
    {
        $this->CompanyName = $CompanyName;
    }

    /**
     * @return mixed
     */
    public function getProgramName()
    {
        return $this->ProgramName;
    }

    /**
     * @param mixed $ProgramName
     */
    public function setProgramName($ProgramName): void
    {
        $this->ProgramName = $ProgramName;
    }

    /**
     * @return mixed
     */
    public function getTransactionDate()
    {
        return $this->TransactionDate;
    }

    /**
     * @param mixed $TransactionDate
     */
    public function setTransactionDate($TransactionDate): void
    {
        $this->TransactionDate = $TransactionDate;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @param mixed $Description
     */
    public function setDescription($Description): void
    {
        $this->Description = $Description;
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
    public function getType()
    {
        return $this->Type;
    }

    /**
     * @param mixed $Type
     */
    public function setType($Type): void
    {
        $this->Type = $Type;
    }

    /**
     * @return mixed
     */
    public function getPaymentMethod()
    {
        return $this->PaymentMethod;
    }

    /**
     * @param mixed $PaymentMethod
     */
    public function setPaymentMethod($PaymentMethod): void
    {
        $this->PaymentMethod = $PaymentMethod;
    }
}
