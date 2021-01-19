<?php

namespace AllDigitalRewards\Xtrm\Entity\Response;

class BeneficiaryWalletsResponse extends AbstractEntity
{
    protected $Name;
    protected $ID;
    protected $Currency;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param mixed $Name
     */
    public function setName($Name): void
    {
        $this->Name = $Name;
    }

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @param mixed $ID
     */
    public function setID($ID): void
    {
        $this->ID = $ID;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->Currency;
    }

    /**
     * @param mixed $Currency
     */
    public function setCurrency($Currency): void
    {
        $this->Currency = $Currency;
    }
}
