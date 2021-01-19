<?php

namespace AllDigitalRewards\Xtrm\Entity\Request;

class BeneficiaryInformationRequest
{
    protected $ContactName;
    protected $PhoneNumber;
    protected $AddressLine1;
    protected $AddressLine2 = '';
    protected $City;
    protected $Region;
    protected $PostalCode;
    protected $CountryISO2;

    /**
     * @return mixed
     */
    public function getContactName()
    {
        return $this->ContactName;
    }

    /**
     * @param mixed $ContactName
     */
    public function setContactName($ContactName): void
    {
        $this->ContactName = $ContactName;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->PhoneNumber;
    }

    /**
     * @param mixed $PhoneNumber
     */
    public function setPhoneNumber($PhoneNumber): void
    {
        $this->PhoneNumber = $PhoneNumber;
    }

    /**
     * @return mixed
     */
    public function getAddressLine1()
    {
        return $this->AddressLine1;
    }

    /**
     * @param mixed $AddressLine1
     */
    public function setAddressLine1($AddressLine1): void
    {
        $this->AddressLine1 = $AddressLine1;
    }

    /**
     * @return string
     */
    public function getAddressLine2(): string
    {
        return $this->AddressLine2;
    }

    /**
     * @param string $AddressLine2
     */
    public function setAddressLine2(string $AddressLine2): void
    {
        $this->AddressLine2 = $AddressLine2;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->City;
    }

    /**
     * @param mixed $City
     */
    public function setCity($City): void
    {
        $this->City = $City;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->Region;
    }

    /**
     * @param mixed $Region
     */
    public function setRegion($Region): void
    {
        $this->Region = $Region;
    }

    /**
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->PostalCode;
    }

    /**
     * @param mixed $PostalCode
     */
    public function setPostalCode($PostalCode): void
    {
        $this->PostalCode = $PostalCode;
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

    public function toArray()
    {
        return call_user_func('get_object_vars', $this);
    }
}
