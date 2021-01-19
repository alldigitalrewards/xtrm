<?php

namespace AllDigitalRewards\Xtrm\Entity\Request;

class ValidateOTPAuthorizeVendorRequest
{
    protected $IssuerAccountNumber;
    protected $RecipientUserId;
    protected $OneTimePassword;

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
    public function getOneTimePassword()
    {
        return $this->OneTimePassword;
    }

    /**
     * @param mixed $OneTimePassword
     */
    public function setOneTimePassword($OneTimePassword): void
    {
        $this->OneTimePassword = $OneTimePassword;
    }

    public function getBody()
    {
        return [
            'ValidateOTPAuthorizeVendor' => [
                'request' => [
                    'IssuerAccountNumber' => $this->getIssuerAccountNumber(),
                    'RecipientUserId' => $this->getRecipientUserId(),
                    'OneTimePassword' => $this->getOneTimePassword(),
                ]
            ]
        ];
    }
}
