<?php

namespace AllDigitalRewards\Xtrm\Entity\Response;

class ProgramDetailsResponse extends AbstractEntity
{
    protected $ProgramId;
    protected $ProgramName;
    protected $ProgramCategory;
    protected $ProgramType;
    protected $IsClaim;

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
    public function getProgramName()
    {
        return $this->ProgramName;
    }

    /**
     * @param mixed $ProgramName
     */
    public function setProgramName($ProgramName): void
    {
        $this->ProgramName = $ProgramName;
    }

    /**
     * @return mixed
     */
    public function getProgramCategory()
    {
        return $this->ProgramCategory;
    }

    /**
     * @param mixed $ProgramCategory
     */
    public function setProgramCategory($ProgramCategory): void
    {
        $this->ProgramCategory = $ProgramCategory;
    }

    /**
     * @return mixed
     */
    public function getProgramType()
    {
        return $this->ProgramType;
    }

    /**
     * @param mixed $ProgramType
     */
    public function setProgramType($ProgramType): void
    {
        $this->ProgramType = $ProgramType;
    }

    /**
     * @return mixed
     */
    public function getIsClaim()
    {
        return $this->IsClaim;
    }

    /**
     * @param mixed $IsClaim
     */
    public function setIsClaim($IsClaim): void
    {
        $this->IsClaim = $IsClaim;
    }
}
