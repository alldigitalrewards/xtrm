<?php

namespace AllDigitalRewards\Xtrm\Entity\Request;

use League\ISO3166\ISO3166;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

class CreateUserRequest
{
    protected $IssuerAccountNumber;
    protected $LegalFirstName;
    protected $LegalLastName;
    protected $EmailAddress;
    protected $EmailNotification = false;
    protected $MobilePhone;
    protected $TaxId;
    /**
     * @var UserAddressRequest
     */
    protected $Address;
    /**
     * @var string[]
     */
    private $errors = [];

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
    public function getLegalFirstName()
    {
        return $this->LegalFirstName;
    }

    /**
     * @param mixed $LegalFirstName
     */
    public function setLegalFirstName($LegalFirstName): void
    {
        $this->LegalFirstName = $LegalFirstName;
    }

    /**
     * @return mixed
     */
    public function getLegalLastName()
    {
        return $this->LegalLastName;
    }

    /**
     * @param mixed $LegalLastName
     */
    public function setLegalLastName($LegalLastName): void
    {
        $this->LegalLastName = $LegalLastName;
    }

    /**
     * @return mixed
     */
    public function getEmailAddress()
    {
        return $this->EmailAddress;
    }

    /**
     * @param mixed $EmailAddress
     */
    public function setEmailAddress($EmailAddress): void
    {
        $this->EmailAddress = $EmailAddress;
    }

    /**
     * @return bool
     */
    public function isEmailNotification(): bool
    {
        return $this->EmailNotification;
    }

    /**
     * @param bool $EmailNotification
     */
    public function setEmailNotification(bool $EmailNotification): void
    {
        $this->EmailNotification = $EmailNotification;
    }

    /**
     * @return mixed
     */
    public function getMobilePhone()
    {
        return $this->MobilePhone;
    }

    /**
     * @param mixed $MobilePhone
     */
    public function setMobilePhone($MobilePhone): void
    {
        $this->MobilePhone = $MobilePhone;
    }

    /**
     * @return mixed
     */
    public function getTaxId()
    {
        return $this->TaxId;
    }

    /**
     * @param mixed $TaxId
     */
    public function setTaxId($TaxId): void
    {
        $this->TaxId = $TaxId;
    }

    /**
     * @return UserAddressRequest
     */
    public function getAddress(): UserAddressRequest
    {
        return $this->Address;
    }

    /**
     * @param UserAddressRequest $Address
     */
    public function setAddress(UserAddressRequest $Address): void
    {
        $this->Address = $Address;
    }

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

    public function getBody(): array
    {
        $address = $this->getAddress()->toArray();
        unset($address['errors']);
        $countryCodeLookup = new ISO3166();
        $countryData = $countryCodeLookup->alpha2($address['Country']);
        if ($countryData) {
            $address['Country'] = $countryData['name'];
            $address['CountryISO2'] = $countryData['alpha2'];
        }

        return [
            'CreateUser' => [
                'request' => [
                    'IssuerAccountNumber' => $this->getIssuerAccountNumber(),
                    'LegalFirstName' => $this->getLegalFirstName(),
                    'LegalLastName' => $this->getLegalLastName(),
                    'EmailAddress' => $this->getEmailAddress(),
                    'EmailNotification' => $this->isEmailNotification(),
                    'MobilePhone' => $this->getMobilePhone(),
                    'TaxId' => $this->getTaxId() ?? '',
                    'Address' => $address,
                ]
            ]
        ];
    }

    public function toArray()
    {
        $data = call_user_func('get_object_vars', $this);
        if (empty($data['Address']) === true) {
            $data['Address'] = new UserAddressRequest();
        }
        if (empty($data['Address']) === false && $data['Address'] instanceof UserAddressRequest) {
            $data['Address'] = $data['Address']->toArray();
        }

        if (empty($data['TaxId']) === true) {
            unset($data['TaxId']);
        }

        return $data;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function validate(array $data): bool
    {
        try {
            $this->getValidator((object)$data);
            $address = new UserAddressRequest();
            if ($address->validate($data['Address']) === false) {
                $this->errors = $address->getErrors();
                return false;
            }
            return true;
        } catch (NestedValidationException $exception) {
            $exceptions = $exception->getMessages(
                [
                    'IssuerAccountNumber',
                    'LegalFirstName',
                    'LegalLastName',
                    'EmailAddress',
                    'EmailNotification',
                    'MobilePhone',
                    'TaxId',
                ]
            );

            $this->errors = array_filter($exceptions);
            return false;
        }
    }

    protected function getValidator($user)
    {
        $userRule = v::attribute('IssuerAccountNumber', v::notEmpty())
            ->attribute('LegalFirstName', v::notEmpty())
            ->attribute('LegalLastName', v::notEmpty())
            ->attribute('EmailAddress', v::email())
            ->attribute('EmailNotification', v::boolVal())
            ->attribute('MobilePhone', v::phone())
            ->attribute('TaxId', v::notEmpty(), false);

        $userRule->assert($user);
    }
}
