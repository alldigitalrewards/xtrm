<?php

namespace AllDigitalRewards\Xtrm\Entity\Request;

class BeneficiaryBankInformationRequest
{
    protected $InstitutionName;
    protected $WithdrawType;
    protected $Currency;
    protected $SWIFTBIC = '';
    protected $AccountNumber = '';
    protected $RoutingNumber = '';
    protected $CountryISO2;
    protected $RemittanceLine3 = '';
    protected $RemittanceLine4 = '';

    /**
     * @return mixed
     */
    public function getInstitutionName()
    {
        return $this->InstitutionName;
    }

    /**
     * @param mixed $InstitutionName
     */
    public function setInstitutionName($InstitutionName): void
    {
        $this->InstitutionName = $InstitutionName;
    }

    /**
     * @return mixed
     */
    public function getWithdrawType()
    {
        return $this->WithdrawType;
    }

    /**
     * @param mixed $WithdrawType
     */
    public function setWithdrawType($WithdrawType): void
    {
        $this->WithdrawType = $WithdrawType;
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
     * @return string
     */
    public function getSWIFTBIC(): string
    {
        return $this->SWIFTBIC;
    }

    /**
     * @param string $SWIFTBIC
     */
    public function setSWIFTBIC(string $SWIFTBIC): void
    {
        $this->SWIFTBIC = $SWIFTBIC;
    }

    /**
     * @return string
     */
    public function getAccountNumber(): string
    {
        return $this->AccountNumber;
    }

    /**
     * @param string $AccountNumber
     */
    public function setAccountNumber(string $AccountNumber): void
    {
        $this->AccountNumber = $AccountNumber;
    }

    /**
     * @return string
     */
    public function getRoutingNumber(): string
    {
        return $this->RoutingNumber;
    }

    /**
     * @param string $RoutingNumber
     */
    public function setRoutingNumber(string $RoutingNumber): void
    {
        $this->RoutingNumber = $RoutingNumber;
    }

    /**
     * @return mixed
     */
    public function getCountryISO2()
    {
        return $this->CountryISO2;
    }

    /**
     * @param mixed $CountryISO2
     */
    public function setCountryISO2($CountryISO2): void
    {
        $this->CountryISO2 = $CountryISO2;
    }

    /**
     * @return string
     */
    public function getRemittanceLine3(): string
    {
        return $this->RemittanceLine3;
    }

    /**
     * @param string $RemittanceLine3
     */
    public function setRemittanceLine3(string $RemittanceLine3): void
    {
        $this->RemittanceLine3 = $RemittanceLine3;
    }

    /**
     * @return string
     */
    public function getRemittanceLine4(): string
    {
        return $this->RemittanceLine4;
    }

    /**
     * @param string $RemittanceLine4
     */
    public function setRemittanceLine4(string $RemittanceLine4): void
    {
        $this->RemittanceLine4 = $RemittanceLine4;
    }

    public function toArray()
    {
        return call_user_func('get_object_vars', $this);
    }
}
