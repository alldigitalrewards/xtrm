<?php

namespace AllDigitalRewards\Xtrm\Entity\Request;

use League\ISO3166\ISO3166;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

class UserAddressRequest
{
    protected $AddressLine1;
    protected $AddressLine2 = '';
    protected $AptSuitNum = '';
    protected $City;
    protected $Country;
    protected $CountryISO2;
    protected $PostalCode;
    protected $Region;
    /**
     * @var string[]
     */
    private $errors;

    /**
     * @return string[]
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @param string[] $errors
     */
    public function setErrors(array $errors): void
    {
        $this->errors = $errors;
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
     * @return string
     */
    public function getAptSuitNum(): string
    {
        return $this->AptSuitNum;
    }

    /**
     * @param string $AptSuitNum
     */
    public function setAptSuitNum(string $AptSuitNum): void
    {
        $this->AptSuitNum = $AptSuitNum;
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

    public function toArray()
    {
        return call_user_func('get_object_vars', $this);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function validate(array $data): bool
    {
        try {
            $this->getValidator((object)$data);
            return $this->isCountryValid($data['Country']);
        } catch (NestedValidationException $exception) {
            $exceptions = $exception->getMessages(
                [
                    'AddressLine1',
                    'City',
                    'Country',
                    'PostalCode',
                    'Region',
                ]
            );

            $this->errors = array_filter($exceptions);
            return false;
        }
    }

    /**
     * @param $country
     * @return bool
     */
    private function isCountryValid($country): bool
    {
        try {
            $countryCodeLookup = new ISO3166();
            $countryData = $countryCodeLookup->alpha2($country);
            return !empty($countryData);
        } catch (\Exception $exception) {
            $this->errors['Country'] = $exception->getMessage();
        }
        return false;
    }

    protected function getValidator($address)
    {
        $addressRule = v::attribute('AddressLine1', v::notEmpty())
            ->attribute('City', v::notEmpty())
            ->attribute('Country', v::notEmpty())
            ->attribute('PostalCode', v::notEmpty())
            ->attribute('Region', v::notEmpty());

        $addressRule->assert($address);
    }
}
