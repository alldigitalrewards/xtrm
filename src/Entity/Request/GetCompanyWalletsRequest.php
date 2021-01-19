<?php

namespace AllDigitalRewards\Xtrm\Entity\Request;

class GetCompanyWalletsRequest
{
    protected $IssuerAccountNumber;

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
     * @return array
     */
    public function getBody(): array
    {
        return [
            'GetCompanywallets' => [
                'request' => [
                    'IssuerAccountNumber' => $this->getIssuerAccountNumber(),
                ]
            ]
        ];
    }
}
