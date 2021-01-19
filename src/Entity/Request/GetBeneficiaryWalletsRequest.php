<?php


namespace AllDigitalRewards\Xtrm\Entity\Request;

class GetBeneficiaryWalletsRequest
{
    private $IssuerAccountNumber;
    private $BeneficiaryAccountNumber;

    /**
     * @return mixed
     */
    public function getIssuerAccountNumber()
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
     * @return mixed
     */
    public function getBeneficiaryAccountNumber()
    {
        return $this->BeneficiaryAccountNumber;
    }

    /**
     * @param mixed $BeneficiaryAccountNumber
     */
    public function setBeneficiaryAccountNumber($BeneficiaryAccountNumber): void
    {
        $this->BeneficiaryAccountNumber = $BeneficiaryAccountNumber;
    }

    public function getBody(): array
    {
        return [
            'GetBeneficiaryWallets' => [
                'request' => [
                    'IssuerAccountNumber' => $this->getIssuerAccountNumber(),
                    'BeneficiaryAccountNumber' => $this->getBeneficiaryAccountNumber(),
                ]
            ]
        ];
    }
}
