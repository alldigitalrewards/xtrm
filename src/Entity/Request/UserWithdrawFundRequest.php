<?php

namespace AllDigitalRewards\Xtrm\Entity\Request;

class UserWithdrawFundRequest
{
    protected $IssuerAccountNumber;
    protected $UserID;
    protected $Amount;
    protected $Currency;
    protected $PaymentMethodId;
    protected $UserLinkedBankID;
    protected $UserPayPalEmailID;
    protected $UserPrepaidVisaEmailID;
    protected $OTP;

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
    public function getUserID()
    {
        return $this->UserID;
    }

    /**
     * @param mixed $UserID
     */
    public function setUserID($UserID): void
    {
        $this->UserID = $UserID;
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
    public function getPaymentMethodId()
    {
        return $this->PaymentMethodId;
    }

    /**
     * @param mixed $PaymentMethodId
     */
    public function setPaymentMethodId($PaymentMethodId): void
    {
        $this->PaymentMethodId = $PaymentMethodId;
    }

    /**
     * @return mixed
     */
    public function getUserLinkedBankID()
    {
        return $this->UserLinkedBankID;
    }

    /**
     * @param mixed $UserLinkedBankID
     */
    public function setUserLinkedBankID($UserLinkedBankID): void
    {
        $this->UserLinkedBankID = $UserLinkedBankID;
    }

    /**
     * @return mixed
     */
    public function getUserPayPalEmailID()
    {
        return $this->UserPayPalEmailID;
    }

    /**
     * @param mixed $UserPayPalEmailID
     */
    public function setUserPayPalEmailID($UserPayPalEmailID): void
    {
        $this->UserPayPalEmailID = $UserPayPalEmailID;
    }

    /**
     * @return mixed
     */
    public function getUserPrepaidVisaEmailID()
    {
        return $this->UserPrepaidVisaEmailID;
    }

    /**
     * @param mixed $UserPrepaidVisaEmailID
     */
    public function setUserPrepaidVisaEmailID($UserPrepaidVisaEmailID): void
    {
        $this->UserPrepaidVisaEmailID = $UserPrepaidVisaEmailID;
    }

    /**
     * @return mixed
     */
    public function getOTP()
    {
        return $this->OTP;
    }

    /**
     * @param mixed $OTP
     */
    public function setOTP($OTP): void
    {
        $this->OTP = $OTP;
    }

    public function getBody(): array
    {
        return [
            'UserWithdrawFund' => [
                'request' => [
                    'IssuerAccountNumber' => $this->getIssuerAccountNumber(),
                    'UserID' => $this->getUserID(),
                    'Amount' => $this->getAmount(),
                    'Currency' => $this->getCurrency(),
                    'PaymentMethodId' => $this->getPaymentMethodId(),
                    'UserLinkedBankID' => $this->getUserLinkedBankID(),
                    'UserPayPalEmailID' => $this->getUserPayPalEmailID(),
                    'UserPrepaidVisaEmailID' => $this->getUserPrepaidVisaEmailID(),
                    'OTP' => $this->getOTP(),
                ]
            ]
        ];
    }
}
