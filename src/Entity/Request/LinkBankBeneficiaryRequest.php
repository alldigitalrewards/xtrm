<?php


namespace AllDigitalRewards\Xtrm\Entity\Request;

class LinkBankBeneficiaryRequest
{
    protected $IssuerAccountNumber;
    protected $UserID;
    /**
     * @var BeneficiaryInformationRequest
     */
    protected $BeneficiaryInformationRequest;
    /**
     * @var BeneficiaryBankInformationRequest
     */
    protected $BeneficiaryBankInformationRequest;

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
    public function getUserID()
    {
        return $this->UserID;
    }

    /**
     * @param mixed $UserID
     */
    public function setUserID($UserID): void
    {
        $this->UserID = $UserID;
    }

    /**
     * @return BeneficiaryInformationRequest
     */
    public function getBeneficiaryInformationRequest(): BeneficiaryInformationRequest
    {
        if ($this->BeneficiaryInformationRequest === null) {
            return new BeneficiaryInformationRequest();
        }
        return $this->BeneficiaryInformationRequest;
    }

    /**
     * @param BeneficiaryInformationRequest $BeneficiaryInformationRequest
     */
    public function setBeneficiaryInformationRequest(BeneficiaryInformationRequest $BeneficiaryInformationRequest): void
    {
        $this->BeneficiaryInformationRequest = $BeneficiaryInformationRequest;
    }

    /**
     * @return BeneficiaryBankInformationRequest
     */
    public function getBeneficiaryBankInformationRequest(): BeneficiaryBankInformationRequest
    {
        if ($this->BeneficiaryBankInformationRequest === null) {
            return new BeneficiaryBankInformationRequest();
        }
        return $this->BeneficiaryBankInformationRequest;
    }

    /**
     * @param BeneficiaryBankInformationRequest $BeneficiaryBankInformationRequest
     */
    public function setBeneficiaryBankInformationRequest(
        BeneficiaryBankInformationRequest $BeneficiaryBankInformationRequest
    ): void {
        $this->BeneficiaryBankInformationRequest = $BeneficiaryBankInformationRequest;
    }

    /**
     * @return array
     */
    public function getBody(): array
    {
        return [
            'LinkBankBeneficiary' => [
                'request' => [
                    'IssuerAccountNumber' => $this->getIssuerAccountNumber(),
                    'UserID' => $this->getUserID(),
                    'Beneficiary' => [
                        'BeneficiaryDetails' => [
                            'BeneficiaryInformation' => $this->getBeneficiaryInformationRequest()->toArray(),
                        ],
                        'BankDetails' => [
                            'BeneficiaryBankInformation' => $this->getBeneficiaryBankInformationRequest()->toArray()
                        ]
                    ],
                ]
            ]
        ];
    }
}
