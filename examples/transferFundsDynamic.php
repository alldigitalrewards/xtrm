<?php

use AllDigitalRewards\Xtrm\Client;
use AllDigitalRewards\Xtrm\Entity\Request\TransactionDetailsRequest;
use AllDigitalRewards\Xtrm\Entity\Request\TransferFundDynamicRequest;
use AllDigitalRewards\Xtrm\Entity\Request\TransferFundNonDynamicRequest;

require __DIR__ . "/../vendor/autoload.php";

$client = new Client();
$client->setApiAccountNumber('');
$client->setBaseUri('');
$client->setClientId('');
$client->setClientSecret('');

$fundRequest = new TransferFundDynamicRequest();
$fundRequest->setIssuerAccountNumber('');
$fundRequest->setFromAccountNumber(''); //SPN Issuer Account Number
$fundRequest->setFromWalletID('');//SPN Wallet ID
$fundRequest->setRecipientFirstName('');//"User First Name(Optional)"
$fundRequest->setRecipientLastName('');//User Last Name(Optional)"
$fundRequest->setRecipientEmail('');
$fundRequest->setCurrency('');
$fundRequest->setAmount('');
$fundRequest->setDescription('');

try {
    $response = $client->transferFundsDynamic($fundRequest);
    var_dump($response);
} catch (\AllDigitalRewards\Xtrm\Exception\XtrmException $e) {
    print_r($e->getMessage());
}
