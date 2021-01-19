<?php

namespace AllDigitalRewards\Xtrm\Entity\Request;

class CheckUserExistRequest
{
    private $IssuerAccountNumber;
    private $Email;

    /**
     * @return string
     */
    public function getIssuerAccountNumber(): string
    {
        return $this->IssuerAccountNumber ?? '';
    }

    /**
     * @param mixed $IssuerAccountNumber
     */
    public function setIssuerAccountNumber($IssuerAccountNumber): void
    {
        $this->IssuerAccountNumber = $IssuerAccountNumber;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->Email ?? '';
    }

    /**
     * @param mixed $Email
     */
    public function setEmail($Email): void
    {
        $this->Email = $Email;
    }

    public function getBody(): array
    {
        return [
            'CheckUserExist' => [
                'request' => [
                    'IssuerAccountNumber' => $this->getIssuerAccountNumber(),
                    'Email' => $this->getEmail(),
                ]
            ]
        ];
    }
}
