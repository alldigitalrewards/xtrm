<?php

use AllDigitalRewards\Xtrm\Client;
use AllDigitalRewards\Xtrm\Entity\Request\ValidateOTPAuthorizeVendorRequest;

require __DIR__ . "/../vendor/autoload.php";

$client = new Client();
$client->setApiAccountNumber('');
$client->setBaseUri('');
$client->setClientId('');
$client->setClientSecret('');

$request = new ValidateOTPAuthorizeVendorRequest();
$request->setIssuerAccountNumber('SPN20136428');
$request->setRecipientUserId('PAT21137140');
$request->setOneTimePassword('password');

try {
    $response = $client->validateOTPAuthorizeVendor($request);
    var_dump($response);
} catch (\AllDigitalRewards\Xtrm\Exception\XtrmException $e) {
    print_r($e->getMessage());
}
