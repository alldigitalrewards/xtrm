<?php

use AllDigitalRewards\Xtrm\Client;

require __DIR__ . "/../vendor/autoload.php";

$client = new Client();
$client->setApiAccountNumber('');
$client->setBaseUri('');
$client->setClientId('');
$client->setClientSecret('');

try {
    $response = $client->getOTPAuthorizedVendorResponse('PAT21137140');
    var_dump($response);
} catch (\AllDigitalRewards\Xtrm\Exception\XtrmException $e) {
    print_r($e->getMessage());
}
