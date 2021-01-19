<?php


namespace AllDigitalRewards\Xtrm\Entity\Response;

class LinkBankBeneficiaryResultResponse extends AbstractEntity
{
    protected $BeneficiaryId;
    protected $BankBeneficiaryStatus;
    protected $AccountIdentityLevel;

    /**
     * @return mixed
     */
    public function getBeneficiaryId()
    {
        return $this->BeneficiaryId;
    }

    /**
     * @param mixed $BeneficiaryId
     */
    public function setBeneficiaryId($BeneficiaryId): void
    {
        $this->BeneficiaryId = $BeneficiaryId;
    }

    /**
     * @return mixed
     */
    public function getBankBeneficiaryStatus()
    {
        return $this->BankBeneficiaryStatus;
    }

    /**
     * @param mixed $BankBeneficiaryStatus
     */
    public function setBankBeneficiaryStatus($BankBeneficiaryStatus): void
    {
        $this->BankBeneficiaryStatus = $BankBeneficiaryStatus;
    }

    /**
     * @return mixed
     */
    public function getAccountIdentityLevel()
    {
        return $this->AccountIdentityLevel;
    }

    /**
     * @param mixed $AccountIdentityLevel
     */
    public function setAccountIdentityLevel($AccountIdentityLevel): void
    {
        $this->AccountIdentityLevel = $AccountIdentityLevel;
    }
}
