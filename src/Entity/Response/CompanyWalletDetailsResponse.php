<?php

namespace AllDigitalRewards\Xtrm\Entity\Response;

class CompanyWalletDetailsResponse extends AbstractEntity
{
    protected $WalletID;
    protected $WalletName;
    protected $WalletCurrency;
    protected $WalletBalance;
    protected $WalletType;

    /**
     * @return mixed
     */
    public function getWalletID()
    {
        return $this->WalletID;
    }

    /**
     * @param mixed $WalletID
     */
    public function setWalletID($WalletID): void
    {
        $this->WalletID = $WalletID;
    }

    /**
     * @return mixed
     */
    public function getWalletName()
    {
        return $this->WalletName;
    }

    /**
     * @param mixed $WalletName
     */
    public function setWalletName($WalletName): void
    {
        $this->WalletName = $WalletName;
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

    /**
     * @return mixed
     */
    public function getWalletBalance()
    {
        return $this->WalletBalance;
    }

    /**
     * @param mixed $WalletBalance
     */
    public function setWalletBalance($WalletBalance): void
    {
        $this->WalletBalance = $WalletBalance;
    }

    /**
     * @return mixed
     */
    public function getWalletType()
    {
        return $this->WalletType;
    }

    /**
     * @param mixed $WalletType
     */
    public function setWalletType($WalletType): void
    {
        $this->WalletType = $WalletType;
    }
}
