<?php

namespace AllDigitalRewards\Xtrm\Services;

class HydrationService
{
    public function hydrate($entity, $data): array
    {
        $container = [];
        if (empty($data) === true) {
            return $container;
        }

        foreach ($data as $item) {
            $container[] = new $entity($item);
        }
        return $container;
    }
}
