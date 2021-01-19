<?php

use AllDigitalRewards\Xtrm\Client;
use AllDigitalRewards\Xtrm\Entity\Request\UserWithdrawFundRequest;
use AllDigitalRewards\Xtrm\Entity\Request\ValidateOTPAuthorizeVendorRequest;

require __DIR__ . "/../vendor/autoload.php";

$client = new Client();
$client->setApiAccountNumber('');
$client->setBaseUri('');
$client->setClientId('');
$client->setClientSecret('');

$request = new UserWithdrawFundRequest();
$request->setIssuerAccountNumber('');
$request->setUserID('PAT21137140');
$request->setAmount('10.00');
$request->setCurrency('USD');
$request->setPaymentMethodId('');
$request->setUserLinkedBankID('');
$request->setUserPayPalEmailID('');
$request->setUserPrepaidVisaEmailID('');

try {
    $response = $client->userWithdrawFund($request);
    var_dump($response);
} catch (\AllDigitalRewards\Xtrm\Exception\XtrmException $e) {
    print_r($e->getMessage());
}
