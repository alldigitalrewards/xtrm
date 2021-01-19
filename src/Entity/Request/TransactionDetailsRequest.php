<?php

namespace AllDigitalRewards\Xtrm\Entity\Request;

class TransactionDetailsRequest
{
    protected $IssuerTransactionId;
    protected $PaymentAmount;
    protected $PartnerAccountNumber;
    protected $RecipientUserId;
    protected $UserLinkedBankID;
    protected $UserPayPalEmailID = '';
    protected $UserPrepaidVisaEmailID = '';
    protected $DealRegId;
    protected $Comment;

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
    public function getPaymentAmount()
    {
        return $this->PaymentAmount;
    }

    /**
     * @param mixed $PaymentAmount
     */
    public function setPaymentAmount($PaymentAmount): void
    {
        $this->PaymentAmount = $PaymentAmount;
    }

    /**
     * @return mixed
     */
    public function getPartnerAccountNumber()
    {
        return $this->PartnerAccountNumber;
    }

    /**
     * @param mixed $PartnerAccountNumber
     */
    public function setPartnerAccountNumber($PartnerAccountNumber): void
    {
        $this->PartnerAccountNumber = $PartnerAccountNumber;
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
     * @return string
     */
    public function getUserPayPalEmailID(): string
    {
        return $this->UserPayPalEmailID;
    }

    /**
     * @param string $UserPayPalEmailID
     */
    public function setUserPayPalEmailID(string $UserPayPalEmailID): void
    {
        $this->UserPayPalEmailID = $UserPayPalEmailID;
    }

    /**
     * @return string
     */
    public function getUserPrepaidVisaEmailID(): string
    {
        return $this->UserPrepaidVisaEmailID;
    }

    /**
     * @param string $UserPrepaidVisaEmailID
     */
    public function setUserPrepaidVisaEmailID(string $UserPrepaidVisaEmailID): void
    {
        $this->UserPrepaidVisaEmailID = $UserPrepaidVisaEmailID;
    }

    /**
     * @return mixed
     */
    public function getDealRegId()
    {
        return $this->DealRegId;
    }

    /**
     * @param mixed $DealRegId
     */
    public function setDealRegId($DealRegId): void
    {
        $this->DealRegId = $DealRegId;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->Comment;
    }

    /**
     * @param mixed $Comment
     */
    public function setComment($Comment): void
    {
        $this->Comment = $Comment;
    }

    public function toArray()
    {
        return call_user_func('get_object_vars', $this);
    }
}
