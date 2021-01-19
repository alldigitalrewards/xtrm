<?php

namespace AllDigitalRewards\Xtrm\Entity\Response;

class UserPaymentMethodDetailsResponse extends AbstractEntity
{
    protected $UserPaymentMethodId;
    protected $UserPaymentMethodName;

    /**
     * @return mixed
     */
    public function getUserPaymentMethodId()
    {
        return $this->UserPaymentMethodId;
    }

    /**
     * @param mixed $UserPaymentMethodId
     */
    public function setUserPaymentMethodId($UserPaymentMethodId): void
    {
        $this->UserPaymentMethodId = $UserPaymentMethodId;
    }

    /**
     * @return mixed
     */
    public function getUserPaymentMethodName()
    {
        return $this->UserPaymentMethodName;
    }

    /**
     * @param mixed $UserPaymentMethodName
     */
    public function setUserPaymentMethodName($UserPaymentMethodName): void
    {
        $this->UserPaymentMethodName = $UserPaymentMethodName;
    }
}
