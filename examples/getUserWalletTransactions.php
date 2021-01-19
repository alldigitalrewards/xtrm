<?php

use AllDigitalRewards\Xtrm\Client;
use AllDigitalRewards\Xtrm\Entity\Request\GetUserWalletTransactionsRequest;

require __DIR__ . "/../vendor/autoload.php";

$client = new Client();
$client->setApiAccountNumber('');
$client->setBaseUri('');
$client->setClientId('');
$client->setClientSecret('');

$request = new GetUserWalletTransactionsRequest();
$request->setIssuerAccountNumber('');
$request->setUserID('PAT21137140');
$request->setWalletCurrency('USD');

try {
    $response = $client->getUserWalletTransactions($request);//pass offset: loop thru
    var_dump($response);
} catch (\AllDigitalRewards\Xtrm\Exception\XtrmException $e) {
    print_r($e->getMessage());
}
