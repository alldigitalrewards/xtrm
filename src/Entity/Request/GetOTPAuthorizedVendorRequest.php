<?php

namespace AllDigitalRewards\Xtrm\Entity\Request;

class GetOTPAuthorizedVendorRequest
{
    protected $IssuerAccountNumber;
    protected $RecipientUserId;

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

    public function getBody()
    {
        return [
            'GetOTPAuthorizedVendor' => [
                'request' => [
                    'IssuerAccountNumber' => $this->getIssuerAccountNumber(),
                    'RecipientUserId' => $this->getRecipientUserId(),
                ]
            ]
        ];
    }
}
