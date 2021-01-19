<?php

use AllDigitalRewards\Xtrm\Client;
use AllDigitalRewards\Xtrm\Entity\Request\LinkBankBeneficiaryRequest;

require __DIR__ . "/../vendor/autoload.php";

$client = new Client();
$client->setApiAccountNumber('');
$client->setBaseUri('');
$client->setClientId('');
$client->setClientSecret('');

try {
    $response = $client->linkBankBeneficiary(new LinkBankBeneficiaryRequest());
    var_dump($response);
} catch (\AllDigitalRewards\Xtrm\Exception\XtrmException $e) {
    print_r($e->getMessage());
}
