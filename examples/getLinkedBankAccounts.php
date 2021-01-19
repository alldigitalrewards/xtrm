<?php

use AllDigitalRewards\Xtrm\Client;

require __DIR__ . "/../vendor/autoload.php";

$client = new Client();
$client->setApiAccountNumber('');
$client->setBaseUri('');
$client->setClientId('');
$client->setClientSecret('');

//pass in a UserId ex.PAT20137129
//get this from Create User response (UserID)
try {
    $response = $client->getLinkedBankAccounts('PAT20137129');
    var_dump($response);
} catch (\AllDigitalRewards\Xtrm\Exception\XtrmException $e) {
    print_r($e->getMessage());
}
