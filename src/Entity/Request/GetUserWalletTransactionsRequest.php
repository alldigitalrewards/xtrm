<?php


namespace AllDigitalRewards\Xtrm\Entity\Request;

class GetUserWalletTransactionsRequest
{
    protected $IssuerAccountNumber;
    protected $UserID;
    protected $WalletCurrency;

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
     * @return mixed
     */
    public function getWalletCurrency()
    {
        return $this->WalletCurrency;
    }

    /**
     * @param mixed $WalletCurrency
     */
    public function setWalletCurrency($WalletCurrency): void
    {
        $this->WalletCurrency = $WalletCurrency;
    }

    public function getBody($offset = 1): array
    {
        return [
            'GetUserWalletTransactions' => [
                'Request' => [
                    'IssuerAccountNumber' => $this->getIssuerAccountNumber(),
                    'UserID' => $this->getUserID(),
                    'WalletCurrency' => $this->getWalletCurrency(),
                    'Pagination' => [
                        'RecordsToSkip' => $offset,
                        'RecordsToTake' => 10,
                    ],
                ]
            ]
        ];
    }
}
