<?php

namespace AllDigitalRewards\Xtrm\Entity\Request;

class TransferFundNonDynamicRequest
{
    protected $IssuerAccountNumber;
    protected $PaymentType;
    protected $PaymentMethodId;
    protected $ProgramId;
    protected $WalletId;
    protected $PaymentDescription;
    protected $PaymentCurrency;
    protected $EmailNotification = true;
    /**
     * @var TransactionDetailsRequest
     */
    protected $transactionDetails;

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
    public function getPaymentType()
    {
        return $this->PaymentType;
    }

    /**
     * @param mixed $PaymentType
     */
    public function setPaymentType($PaymentType): void
    {
        $this->PaymentType = $PaymentType;
    }

    /**
     * @return mixed
     */
    public function getPaymentMethodId()
    {
        return $this->PaymentMethodId;
    }

    /**
     * @param mixed $PaymentMethodId
     */
    public function setPaymentMethodId($PaymentMethodId): void
    {
        $this->PaymentMethodId = $PaymentMethodId;
    }

    /**
     * @return mixed
     */
    public function getProgramId()
    {
        return $this->ProgramId;
    }

    /**
     * @param mixed $ProgramId
     */
    public function setProgramId($ProgramId): void
    {
        $this->ProgramId = $ProgramId;
    }

    /**
     * @return mixed
     */
    public function getWalletId()
    {
        return $this->WalletId;
    }

    /**
     * @param mixed $WalletId
     */
    public function setWalletId($WalletId): void
    {
        $this->WalletId = $WalletId;
    }

    /**
     * @return mixed
     */
    public function getPaymentDescription()
    {
        return $this->PaymentDescription;
    }

    /**
     * @param mixed $PaymentDescription
     */
    public function setPaymentDescription($PaymentDescription): void
    {
        $this->PaymentDescription = $PaymentDescription;
    }

    /**
     * @return mixed
     */
    public function getPaymentCurrency()
    {
        return $this->PaymentCurrency;
    }

    /**
     * @param mixed $PaymentCurrency
     */
    public function setPaymentCurrency($PaymentCurrency): void
    {
        $this->PaymentCurrency = $PaymentCurrency;
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
     * @return TransactionDetailsRequest
     */
    public function getTransactionDetails(): TransactionDetailsRequest
    {
        return $this->transactionDetails;
    }

    /**
     * @param TransactionDetailsRequest $transactionDetails
     */
    public function setTransactionDetails(TransactionDetailsRequest $transactionDetails): void
    {
        $this->transactionDetails = $transactionDetails;
    }

    public function getBody()
    {
        return [
            'TransferFund' => [
                'request' => [
                    'Transaction' => [
                        'IssuerAccountNumber' => $this->getIssuerAccountNumber(),
                        'PaymentType' => $this->getPaymentType(),
                        'PaymentMethodId' => $this->getPaymentMethodId(),
                        'ProgramId' => $this->getProgramId(),
                        'WalletId' => $this->getWalletId(),
                        'PaymentDescription' => $this->getPaymentDescription(),
                        'PaymentCurrency' => $this->getPaymentCurrency(),
                        'EmailNotification' => $this->isEmailNotification(),
                        'TransactionDetails' => [
                            $this->getTransactionDetails()->toArray()
                        ],
                    ],
                ]
            ]
        ];
    }
}
