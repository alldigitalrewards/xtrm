<?php

namespace AllDigitalRewards\Xtrm\Entity\Request;

class TransferFundDynamicRequest
{
    protected $IssuerAccountNumber;
    protected $FromAccountNumber;
    protected $FromWalletID;
    protected $RecipientFirstName;
    protected $RecipientLastName;
    protected $RecipientEmail;
    protected $Currency;
    protected $Amount;
    protected $Description;

    /**
     * @return mixed
     */
    public function getIssuerAccountNumber()
    {
        return $this->IssuerAccountNumber;
    }

    /**
     * @param mixed $IssuerAccountNumber
     */
    public function setIssuerAccountNumber($IssuerAccountNumber): void
    {
        $this->IssuerAccountNumber = $IssuerAccountNumber;
    }

    /**
     * @return mixed
     */
    public function getFromAccountNumber()
    {
        return $this->FromAccountNumber;
    }

    /**
     * @param mixed $FromAccountNumber
     */
    public function setFromAccountNumber($FromAccountNumber): void
    {
        $this->FromAccountNumber = $FromAccountNumber;
    }

    /**
     * @return mixed
     */
    public function getFromWalletID()
    {
        return $this->FromWalletID;
    }

    /**
     * @param mixed $FromWalletID
     */
    public function setFromWalletID($FromWalletID): void
    {
        $this->FromWalletID = $FromWalletID;
    }

    /**
     * @return mixed
     */
    public function getRecipientFirstName()
    {
        return $this->RecipientFirstName;
    }

    /**
     * @param mixed $RecipientFirstName
     */
    public function setRecipientFirstName($RecipientFirstName): void
    {
        $this->RecipientFirstName = $RecipientFirstName;
    }

    /**
     * @return mixed
     */
    public function getRecipientLastName()
    {
        return $this->RecipientLastName;
    }

    /**
     * @param mixed $RecipientLastName
     */
    public function setRecipientLastName($RecipientLastName): void
    {
        $this->RecipientLastName = $RecipientLastName;
    }

    /**
     * @return mixed
     */
    public function getRecipientEmail()
    {
        return $this->RecipientEmail;
    }

    /**
     * @param mixed $RecipientEmail
     */
    public function setRecipientEmail($RecipientEmail): void
    {
        $this->RecipientEmail = $RecipientEmail;
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

    public function getBody()
    {
        return [
            'TransferFundToDynamicAccountUser' => [
                'Request' => [
                    'Transaction' => [
                        'IssuerAccountNumber' => $this->getIssuerAccountNumber(),
                        'FromAccountNumber' => $this->getFromAccountNumber(),
                        'FromWalletID' => $this->getFromWalletID(),
                        'RecipientFirstName' => $this->getRecipientFirstName(),
                        'RecipientLastName' => $this->getRecipientLastName(),
                        'RecipientEmail' => $this->getRecipientEmail(),
                        'Currency' => $this->getCurrency(),
                        'Amount' => $this->getAmount(),
                        'Description' => $this->getDescription(),
                    ],
                ]
            ]
        ];
    }
}
