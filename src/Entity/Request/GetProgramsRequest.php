<?php

namespace AllDigitalRewards\Xtrm\Entity\Request;

class GetProgramsRequest
{
    private $IssuerAccountNumber;

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

    public function getBody($offset = 1): array
    {
        return [
            'GetPrograms' => [
                'request' => [
                    'IssuerAccountNumber' => $this->getIssuerAccountNumber(),
                    'Pagination' => [
                        'RecordsToSkip' => $offset,
                        'RecordsToTake' => 10,
                    ],
                ]
            ]
        ];
    }
}
