<?php

use AllDigitalRewards\Xtrm\Client;
use AllDigitalRewards\Xtrm\Entity\Request\CreateUserRequest;
use AllDigitalRewards\Xtrm\Entity\Request\UserAddressRequest;

require __DIR__ . "/../vendor/autoload.php";

$client = new Client();
$client->setApiAccountNumber('');
$client->setBaseUri('');
$client->setClientId('');
$client->setClientSecret('');

$user = new CreateUserRequest();
$user->setLegalFirstName('John');
$user->setLegalLastName('Doe');
$user->setEmailAddress('jdoe@xtrm.com');
$user->setEmailNotification(true);
$user->setMobilePhone('888-888-8888');

$userAddress = new UserAddressRequest();
$userAddress->setAddressLine1('303 Twin Dolphin Drive');
$userAddress->setCity('Redwood City');
$userAddress->setCountry('US');
$userAddress->setPostalCode('94065');
$userAddress->setRegion('CA');

$user->setAddress($userAddress);

try {
    $response = $client->createUser($user);
    var_dump($response); //ex 'PAT21137140'
} catch (\AllDigitalRewards\Xtrm\Exception\XtrmException $e) {
    print_r($e->getMessage());
}
