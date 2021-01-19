<?php

namespace AllDigitalRewards\Xtrm\Entity\Response;

class BeneficiaryDetailsResponse extends AbstractEntity
{
    protected $BeneficiaryId;
    protected $BeneficiaryName;
    protected $Currency;
    protected $Country;
    protected $TransferFee;
    protected $PaymentMethods;
    protected $BankDetails;

    /**
     * @return mixed
     */
    public function getBeneficiaryId()
    {
        return $this->BeneficiaryId;
    }

    /**
     * @param mixed $BeneficiaryId
     */
    public function setBeneficiaryId($BeneficiaryId): void
    {
        $this->BeneficiaryId = $BeneficiaryId;
    }

    /**
     * @return mixed
     */
    public function getBeneficiaryName()
    {
        return $this->BeneficiaryName;
    }

    /**
     * @param mixed $BeneficiaryName
     */
    public function setBeneficiaryName($BeneficiaryName): void
    {
        $this->BeneficiaryName = $BeneficiaryName;
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
    public function getCountry()
    {
        return $this->Country;
    }

    /**
     * @param mixed $Country
     */
    public function setCountry($Country): void
    {
        $this->Country = $Country;
    }

    /**
     * @return mixed
     */
    public function getTransferFee()
    {
        return $this->TransferFee;
    }

    /**
     * @param mixed $TransferFee
     */
    public function setTransferFee($TransferFee): void
    {
        $this->TransferFee = $TransferFee;
    }

    /**
     * @return mixed
     */
    public function getPaymentMethods()
    {
        return $this->PaymentMethods;
    }

    /**
     * @param mixed $PaymentMethods
     */
    public function setPaymentMethods($PaymentMethods): void
    {
        $this->PaymentMethods = $PaymentMethods;
    }

    /**
     * @return mixed
     */
    public function getBankDetails()
    {
        return $this->BankDetails;
    }

    /**
     * @param mixed $BankDetails
     */
    public function setBankDetails($BankDetails): void
    {
        $this->BankDetails = $BankDetails;
    }
}
