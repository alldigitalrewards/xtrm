<?php

use AllDigitalRewards\Xtrm\Client;
use AllDigitalRewards\Xtrm\Entity\Request\TransactionDetailsRequest;
use AllDigitalRewards\Xtrm\Entity\Request\TransferFundNonDynamicRequest;

require __DIR__ . "/../vendor/autoload.php";

$client = new Client();
$client->setApiAccountNumber('');
$client->setBaseUri('');
$client->setClientId('');
$client->setClientSecret('');

$fundRequest = new TransferFundNonDynamicRequest();
$fundRequest->setIssuerAccountNumber('');
$fundRequest->setPaymentType('Personal');
$fundRequest->setPaymentMethodId('PaymentMethodID');//"Use 'GetPaymentMethods' to get PaymentMethodID"
$fundRequest->setProgramId('');//"Use 'GetPrograms' to get Program ID"
$fundRequest->setWalletId('');//"Use 'GetCompanyWallets' to get WalletID"
$fundRequest->setPaymentDescription('');
$fundRequest->setPaymentCurrency('');
$fundRequest->setEmailNotification(true);

$transactionDetails = new TransactionDetailsRequest();
$transactionDetails->setIssuerTransactionId('');
$transactionDetails->setPaymentAmount('');
$transactionDetails->setPartnerAccountNumber('');
$transactionDetails->setRecipientUserId('');
$transactionDetails->setUserLinkedBankID(''); //"Use 'GetLinkedBankAccounts' to get UserLinkedBankID"
$transactionDetails->setDealRegId('');
$transactionDetails->setComment('');

$fundRequest->setTransactionDetails($transactionDetails);

try {
    $response = $client->transferFundsNonDynamic($fundRequest);
    var_dump($response);
} catch (\AllDigitalRewards\Xtrm\Exception\XtrmException $e) {
    print_r($e->getMessage());
}
