<?php

namespace AllDigitalRewards\Xtrm;

use AllDigitalRewards\Xtrm\Entity\Request\GetOTPAuthorizedVendorRequest;
use AllDigitalRewards\Xtrm\Entity\Request\GetUserWalletTransactionsRequest;
use AllDigitalRewards\Xtrm\Entity\Request\LinkBankBeneficiaryRequest;
use AllDigitalRewards\Xtrm\Entity\Request\TransferFundDynamicRequest;
use AllDigitalRewards\Xtrm\Entity\Request\UserWithdrawFundRequest;
use AllDigitalRewards\Xtrm\Entity\Request\ValidateOTPAuthorizeVendorRequest;
use AllDigitalRewards\Xtrm\Entity\Response\BeneficiaryDetailsResponse;
use AllDigitalRewards\Xtrm\Entity\Request\CheckUserExistRequest;
use AllDigitalRewards\Xtrm\Entity\Response\BeneficiaryWalletsResponse;
use AllDigitalRewards\Xtrm\Entity\Response\CompanyWalletDetailsResponse;
use AllDigitalRewards\Xtrm\Entity\Request\CreateUserRequest;
use AllDigitalRewards\Xtrm\Entity\Request\GetBeneficiaryWalletsRequest;
use AllDigitalRewards\Xtrm\Entity\Request\GetCompanyWalletsRequest;
use AllDigitalRewards\Xtrm\Entity\Request\GetLinkedBankAccountsRequest;
use AllDigitalRewards\Xtrm\Entity\Request\GetProgramsRequest;
use AllDigitalRewards\Xtrm\Entity\Response\LinkBankBeneficiaryResultResponse;
use AllDigitalRewards\Xtrm\Entity\Response\ProgramDetailsResponse;
use AllDigitalRewards\Xtrm\Entity\Response\TransactionDetailResponse;
use AllDigitalRewards\Xtrm\Entity\Request\TransferFundNonDynamicRequest;
use AllDigitalRewards\Xtrm\Entity\Response\TransferFundToDynamicAccountUserResultResponse;
use AllDigitalRewards\Xtrm\Entity\Response\UserPaymentMethodDetailsResponse;
use AllDigitalRewards\Xtrm\Entity\Response\UserWalletTransactionsResponse;
use AllDigitalRewards\Xtrm\Entity\Response\UserWithdrawFundResultResponse;
use AllDigitalRewards\Xtrm\Services\HydrationService;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;
use AllDigitalRewards\Xtrm\Exception\XtrmException;

class Client
{
    const USER_EXISTS_ENDPOINT = 'Beneficiary/CheckUserExist';
    const USER_CREATE_ENDPOINT = 'Register/CreateUser';
    const GET_LINKED_BANK_ACCOUNTS = 'Bank/GetLinkedBankAccounts';
    const LINK_BANK_BENEFICIARY = 'Bank/LinkBankBeneficiary';
    const USER_PAYMENT_METHODS = 'Payment/GetUserPaymentMethods';
    const TRANSFER_FUNDS_NON_DYNAMIC = 'Fund/TransferFund';
    const TRANSFER_FUNDS_DYNAMIC = 'Fund/TransferFundDynamicAccountCreateUser';
    const GET_PROGRAMS = 'Programs/GetPrograms';
    const GET_COMPANY_WALLETS = 'Wallet/GetCompanyWallets';
    const GET_BENEFICIARY_WALLETS = 'Wallet/GetBeneficiaryWallets';
    const GET_USER_WALLET_TRANSACTIONS = 'Wallet/GetUserWalletTransactions';
    const GET_OTP_AUTHORIZED_VENDOR = 'OTP/GetOTPAuthorizedVendor'; //one-time password
    const VALIDATE_OTP_AUTHORIZED_VENDOR = 'OTP/ValidateOTPAuthorizeVendor';
    const USER_WITHDRAW_FUND = 'Fund/UserWithdrawFund';

    /**
     * @var \GuzzleHttp\Client
     */
    private $httpClient;
    /**
     * @var string
     */
    private $grantType = 'password';
    /**
     * @var string
     */
    private $apiAccountNumber = '';
    /**
     * @var string
     */
    private $baseUri = '';
    /**
     * @var string
     */
    private $clientId = '';
    /**
     * @var string
     */
    private $clientSecret = '';
    /**
     * @var string
     */
    private $authToken = '';
    /**
     * @var string
     */
    private $tokenExpiry = '';
    /**
     * @var string
     */
    private $path = '';
    /**
     * @var mixed
     */
    private $requestBody;
    /**
     * @var string
     */
    private $requestType = '';
    /**
     * @var array
     */
    private $errors = [];

    /**
     * @return \GuzzleHttp\Client
     */
    private function getHttpClient(): \GuzzleHttp\Client
    {
        if ($this->httpClient === null) {
            $this->httpClient = new \GuzzleHttp\Client(
                [
                    'http_errors' => false,
                    'allow_redirects' => false,
                ]
            );
        }
        return $this->httpClient;
    }

    /**
     * @param \GuzzleHttp\Client $httpClient
     */
    public function setHttpClient($httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @return string
     */
    public function getGrantType(): string
    {
        return $this->grantType;
    }

    /**
     * @param string $grantType
     */
    public function setGrantType(string $grantType): void
    {
        $this->grantType = $grantType;
    }

    /**
     * @return string
     */
    public function getApiAccountNumber(): string
    {
        return $this->apiAccountNumber;
    }

    /**
     * @param string $apiAccountNumber
     */
    public function setApiAccountNumber(string $apiAccountNumber)
    {
        $this->apiAccountNumber = $apiAccountNumber;
    }

    /**
     * @return string
     */
    public function getBaseUri(): string
    {
        return $this->baseUri;
    }

    /**
     * @param string $baseUri
     */
    public function setBaseUri(string $baseUri)
    {
        $this->baseUri = $baseUri;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * @param string $clientId
     */
    public function setClientId(string $clientId)
    {
        $this->clientId = $clientId;
    }

    /**
     * @return string
     */
    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }

    /**
     * @param string $clientSecret
     */
    public function setClientSecret(string $clientSecret)
    {
        $this->clientSecret = $clientSecret;
    }

    /**
     * @return string
     */
    public function getAuthToken(): string
    {
        return $this->authToken ?? '';
    }

    /**
     * @param string $authToken
     */
    public function setAuthToken(string $authToken)
    {
        $this->authToken = $authToken;
    }

    /**
     * Default to yesterday, force a re-auth if null
     *
     * @return string
     */
    public function getTokenExpiry(): string
    {
        return $this->tokenExpiry ?? 'yesterday';
    }

    /**
     * @param string $tokenExpiry
     */
    public function setTokenExpiry(string $tokenExpiry): void
    {
        $this->tokenExpiry = $tokenExpiry;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return trim($this->getBaseUri(), '/') . '/API/V4/' . $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path)
    {
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getRequestBody()
    {
        if ($this->requestBody !== null) {
            return json_encode($this->requestBody);
        }
        return json_encode([]);
    }

    /**
     * @param array $requestBody
     */
    public function setRequestBody(array $requestBody)
    {
        $this->requestBody = $requestBody;
    }

    /**
     * @return string
     */
    public function getRequestType(): string
    {
        return $this->requestType;
    }

    /**
     * @param string $requestType
     */
    public function setRequestType(string $requestType)
    {
        $this->requestType = $requestType;
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return array_unique($this->errors);
    }

    /**
     * @param array $errors
     */
    public function setErrors(array $errors)
    {
        $this->errors = $errors;
    }

    /**
     * @throws Exception
     */
    private function requestToken()
    {
        if (empty($this->getAuthToken()) === true || $this->isTokenExpired() === true) {
            try {
                $url = trim($this->getBaseUri(), '/') . '/oAuth/token';
                $response = $this->getHttpClient()->request(
                    'POST',
                    $url,
                    [
                        'debug' => false,
                        'headers' => [
                            'Accept' => 'application/json',
                            'Content-Type' => 'application/x-www-form-urlencoded'
                        ],
                        'form_params' => [
                            'grant_type' => $this->getGrantType(),
                            'client_id' => $this->getClientId(),
                            'client_secret' => $this->getClientSecret(),
                        ]
                    ]
                );

                $body = json_decode($response->getBody(), true);
                if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 299) {
                    $this->setAuthToken($body['access_token']);
                    $this->setTokenExpiry($body['.expires']);
                } else {
                    $this->setRequestExceptionError($body);
                    $this->throwException();
                }
            } catch (GuzzleException | Exception $exception) {
                throw new XtrmException($exception->getMessage());
            }
        }
    }

    /**
     * @param string $email
     * @return bool
     * @throws XtrmException
     */
    public function doesUserExist(string $email): bool
    {
        $this->setRequestType('POST');
        $this->setPath(self::USER_EXISTS_ENDPOINT);

        $request = new CheckUserExistRequest();
        $request->setIssuerAccountNumber($this->getApiAccountNumber());
        $request->setEmail($email);
        $this->setRequestBody($request->getBody());

        $response = $this->call();
        if ($response !== null) {
            return !empty($response['CheckUserExistResponse']['CheckUserExistResult']['Beneficiary']);
        }
        $this->throwException();
    }

    /**
     * @param string $recipientUserId
     * @return string
     * @throws XtrmException
     */
    public function getOTPAuthorizedVendorResponse(string $recipientUserId): string
    {
        $this->setRequestType('POST');
        $this->setPath(self::GET_OTP_AUTHORIZED_VENDOR);

        $request = new GetOTPAuthorizedVendorRequest();
        $request->setIssuerAccountNumber($this->getApiAccountNumber());
        $request->setRecipientUserId($recipientUserId);
        $this->setRequestBody($request->getBody());

        $response = $this->call();
        if (empty(
            $response
              ['GetOTPAuthorizedVendorResponse']
              ['GetOTPAuthorizedVendorResult']
              ['Message']
        ) === false) {
            return $response
            ['GetOTPAuthorizedVendorResponse']
            ['GetOTPAuthorizedVendorResult']
            ['Message'];
        }
        $this->throwException();
    }

    /**
     * @param ValidateOTPAuthorizeVendorRequest $request
     * @return string
     * @throws XtrmException
     */
    public function validateOTPAuthorizeVendor(ValidateOTPAuthorizeVendorRequest $request): string
    {
        $this->setRequestType('POST');
        $this->setPath(self::VALIDATE_OTP_AUTHORIZED_VENDOR);
        $this->setRequestBody($request->getBody());

        $response = $this->call();
        if (empty(
            $response
              ['ValidateOTPAuthorizeVendorResponse']
              ['ValidateOTPAuthorizeVendorResult']
              ['Message']
        ) === false) {
            return $response
            ['ValidateOTPAuthorizeVendorResponse']
            ['ValidateOTPAuthorizeVendorResult']
            ['Message'];
        }
        $this->throwException();
    }

    /**
     * @return UserPaymentMethodDetailsResponse[]
     * @throws XtrmException
     */
    public function getPaymentMethods(): array
    {
        $this->setRequestType('POST');
        $this->setPath(self::USER_PAYMENT_METHODS);
        $response = $this->call();
        if (empty($response
            ['GetUserPaymentMethodsResponse']
            ['UserPaymentMethodResult']
            ['UserPaymentMethods']
            ['UserPaymentMethodDetails']) === false) {
            $details =
                $response
                ['GetUserPaymentMethodsResponse']
                ['UserPaymentMethodResult']
                ['UserPaymentMethods']
                ['UserPaymentMethodDetails'];
            return $this->hydrationService()->hydrate(UserPaymentMethodDetailsResponse::class, $details);
        }
        if (empty($this->getErrors()) === false) {
            $this->throwException();
        }
        return [];
    }

    /**
     * @return CompanyWalletDetailsResponse[]
     * @throws XtrmException
     */
    public function getCompanyWallets(): array
    {
        $this->setRequestType('POST');
        $this->setPath(self::GET_COMPANY_WALLETS);
        $request = new GetCompanyWalletsRequest();
        $request->setIssuerAccountNumber($this->getApiAccountNumber());
        $this->setRequestBody($request->getBody());

        $response = $this->call();
        if (empty($response
            ['GetCompanyWalletResponse']
            ['CompanyWalletResult']
            ['CompanyWallets']
            ['CompanyWalletDetails']) === false) {
            $details =
                $response
                ['GetCompanyWalletResponse']
                ['CompanyWalletResult']
                ['CompanyWallets']
                ['CompanyWalletDetails'];
            return $this->hydrationService()->hydrate(CompanyWalletDetailsResponse::class, $details);
        }
        if (empty($this->getErrors()) === false) {
            $this->throwException();
        }
        return [];
    }

    /**
     * @param LinkBankBeneficiaryRequest $request
     * @return LinkBankBeneficiaryResultResponse[]
     * @throws XtrmException
     */
    public function linkBankBeneficiary(LinkBankBeneficiaryRequest $request): array
    {
        $this->setRequestType('POST');
        $this->setPath(self::LINK_BANK_BENEFICIARY);
        $request->setIssuerAccountNumber($this->getApiAccountNumber());
        $this->setRequestBody($request->getBody());

        $response = $this->call();
        if (empty($response
                  ['LinkBankBeneficiaryResponse']
                  ['LinkBankBeneficiaryResult']) === false) {
            $details =
                $response
                ['LinkBankBeneficiaryResponse']
                ['LinkBankBeneficiaryResult'];
            return $this->hydrationService()->hydrate(LinkBankBeneficiaryResultResponse::class, $details);
        }

        if (empty($this->getErrors()) === false) {
            $this->throwException();
        }
        return [];
    }

    /**
     * @param string $userAccountId
     * @return BeneficiaryDetailsResponse[]
     * @throws XtrmException
     */
    public function getLinkedBankAccounts(string $userAccountId): array
    {
        $this->setRequestType('POST');
        $this->setPath(self::GET_LINKED_BANK_ACCOUNTS);

        $request = new GetLinkedBankAccountsRequest();
        $request->setIssuerAccountNumber($this->getApiAccountNumber());
        $request->setRecipientUserId($userAccountId);
        $this->setRequestBody($request->getBody());

        $response = $this->call();
        if (empty($response
            ['GetLinkedBankAccountsResponse']
            ['GetLinkedBankAccountsResult']
            ['Beneficiary']
            ['BeneficiaryDetails']) === false) {
            $details =
                $response
                ['GetLinkedBankAccountsResponse']
                ['GetLinkedBankAccountsResult']
                ['Beneficiary']
                ['BeneficiaryDetails'];
            return $this->hydrationService()->hydrate(BeneficiaryDetailsResponse::class, $details);
        }
        if (empty($this->getErrors()) === false) {
            $this->throwException();
        }
        return [];
    }

    /**
     * @param int $offset
     * @return ProgramDetailsResponse[]
     * @throws XtrmException
     */
    public function getPrograms($offset = 1): array
    {
        $this->setRequestType('POST');
        $this->setPath(self::GET_PROGRAMS);

        $request = new GetProgramsRequest();
        $request->setIssuerAccountNumber($this->getApiAccountNumber());
        $this->setRequestBody($request->getBody($offset));

        $response = $this->call();
        if (empty($response
            ['GetProgramsResponse']
            ['ProgramsResult']
            ['Programs']
            ['ProgramDetails']) === false) {
            $details =
                $response
                ['GetProgramsResponse']
                ['ProgramsResult']
                ['Programs']
                ['ProgramDetails'];
            return $this->hydrationService()->hydrate(ProgramDetailsResponse::class, $details);
        }
        if (empty($this->getErrors()) === false) {
            $this->throwException();
        }
        return [];
    }

    /**
     * @param GetUserWalletTransactionsRequest $request
     * @param int $offset
     * @return UserWalletTransactionsResponse[]
     * @throws XtrmException
     */
    public function getUserWalletTransactions(GetUserWalletTransactionsRequest $request, $offset = 1): array
    {
        $this->setRequestType('POST');
        $this->setPath(self::GET_USER_WALLET_TRANSACTIONS);
        $this->setRequestBody($request->getBody($offset));

        $response = $this->call();
        if (empty(
            $response
            ['GetUserWalletTransactionsResponse']
            ['GetUserWalletTransactionsResult']
            ['Transactions']
        ) === false) {
            $details =
                $response
                ['GetUserWalletTransactionsResponse']
                ['GetUserWalletTransactionsResult']
                ['Transactions'];
            return $this->hydrationService()->hydrate(UserWalletTransactionsResponse::class, $details);
        }
        if (empty($this->getErrors()) === false) {
            $this->throwException();
        }

        return [];
    }

    /**
     * @param string $beneficiaryAccountNumber
     * @return BeneficiaryWalletsResponse[]
     * @throws XtrmException
     */
    public function getBeneficiaryWallets(string $beneficiaryAccountNumber): array
    {
        $this->setRequestType('POST');
        $this->setPath(self::GET_BENEFICIARY_WALLETS);

        $request = new GetBeneficiaryWalletsRequest();
        $request->setIssuerAccountNumber($this->getApiAccountNumber());
        $request->setBeneficiaryAccountNumber($beneficiaryAccountNumber);
        $this->setRequestBody($request->getBody());

        $response = $this->call();
        if (empty(
            $response
              ['GetBeneficiaryWalletsResponse']
              ['GetBeneficiaryWalletsResult']
              ['Wallets']
        ) === false) {
            $details =
                $response
                ['GetBeneficiaryWalletsResponse']
                ['GetBeneficiaryWalletsResult']
                ['Wallets'];
            return $this->hydrationService()->hydrate(BeneficiaryWalletsResponse::class, $details);
        }
        if (empty($this->getErrors()) === false) {
            $this->throwException();
        }
        return [];
    }

    /**
     * @param CreateUserRequest $createUserRequest
     * @return string
     * @throws XtrmException
     */
    public function createUser(CreateUserRequest $createUserRequest): string
    {
        $this->setRequestType('POST');
        $this->setPath(self::USER_CREATE_ENDPOINT);
        $createUserRequest->setIssuerAccountNumber($this->getApiAccountNumber());
        if ($createUserRequest->validate($createUserRequest->toArray()) === false) {
            $this->setErrors($createUserRequest->getErrors());
            $this->throwException();
        }
        $this->setRequestBody($createUserRequest->getBody());
        $response = $this->call();
        if (empty($response['CreateUserResponse']['CreateUserResult']['UserID']) === false) {
            return $response['CreateUserResponse']['CreateUserResult']['UserID'];
        }

        $this->throwException();
    }

    /**
     * @param TransferFundNonDynamicRequest $request
     * @return TransactionDetailResponse[]
     * @throws XtrmException
     */
    public function transferFundsNonDynamic(TransferFundNonDynamicRequest $request): array
    {
        $this->setRequestType('POST');
        $this->setPath(self::TRANSFER_FUNDS_NON_DYNAMIC);
        $request->setIssuerAccountNumber($this->getApiAccountNumber());
        $this->setRequestBody($request->getBody());
        $response = $this->call();
        if (empty($response['TransferFundResponse']['TransferFundResult']['TransactionDetail']) === false) {
            $details = $response['TransferFundResponse']['TransferFundResult']['TransactionDetail'];
            return $this->hydrationService()->hydrate(TransactionDetailResponse::class, $details);
        }
        if (empty($this->getErrors()) === false) {
            $this->throwException();
        }
        return [];
    }

    /**
     * @param UserWithdrawFundRequest $request
     * @return array
     * @throws XtrmException
     */
    public function userWithdrawFund(UserWithdrawFundRequest $request): array
    {
        $this->setRequestType('POST');
        $this->setPath(self::USER_WITHDRAW_FUND);
        $this->setRequestBody($request->getBody());
        $response = $this->call();
        if (empty(
            $response
            ['UserWithdrawFundResponse']
            ['UserWithdrawFundResult']
        ) === false) {
            $details = $response
                       ['UserWithdrawFundResponse']
                       ['UserWithdrawFundResult'];
            return $this->hydrationService()->hydrate(UserWithdrawFundResultResponse::class, $details);
        }
        if (empty($this->getErrors()) === false) {
            $this->throwException();
        }
        return [];
    }

    /**
     * @param TransferFundDynamicRequest $request
     * @return array
     * @throws XtrmException
     */
    public function transferFundsDynamic(TransferFundDynamicRequest $request): array
    {
        $this->setRequestType('POST');
        $this->setPath(self::TRANSFER_FUNDS_DYNAMIC);
        $request->setIssuerAccountNumber($this->getApiAccountNumber());
        $this->setRequestBody($request->getBody());
        $response = $this->call();
        if (empty(
            $response
            ['TransferFundToDynamicAccountUserResponse']
            ['TransferFundToDynamicAccountUserResult']
        ) === false) {
            $details = $response
                       ['TransferFundToDynamicAccountUserResponse']
                       ['TransferFundToDynamicAccountUserResult'];
            return $this->hydrationService()->hydrate(TransferFundToDynamicAccountUserResultResponse::class, $details);
        }
        if (empty($this->getErrors()) === false) {
            $this->throwException();
        }
        return [];
    }

    /**
     * @return mixed|null
     */
    private function call()
    {
        try {
            $this->requestToken();

            $response = $this->getHttpClient()->request(
                $this->getRequestType(),
                $this->getPath(),
                $this->getHeaders()
            );

            $result = json_decode($response->getBody(), true);
            if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 299) {
                return $result;
            }
            $this->setRequestExceptionError($result);
        } catch (GuzzleException | Exception $exception) {
            $this->errors[] = $exception->getMessage();
        }
        return null;
    }

    /**
     * @return array
     */
    private function getHeaders(): array
    {
        return $headers = [
            'debug' => false,
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $this->getAuthToken(),
            ],
            'body' => $this->getRequestBody()
        ];
    }

    /**
     * Default error message if these three keys aren't present
     * @param $errors
     */
    private function setRequestExceptionError($errors)
    {
        if ($errors instanceof stdClass) {
            $errors = (array)$errors;
        }
        if (empty($errors)) {
            $this->errors[] = 'No error message available.';
            return;
        }

        $this->buildErrorsArray($errors);
    }

    private function buildErrorsArray($errors)
    {
        if (empty($errors)) {
            return;
        }

        $possibleKeys = ['error_description', 'error_message', 'error', 'Errors'];

        foreach ($errors as $key => $value) {
            if (in_array($key, $possibleKeys) === true) {
                $message = $errors[$key];
                if (is_array($message) === true) {
                    //some are array messages, so explode
                    $message = implode(', ', $message);
                }
                if (empty($message) === false) {
                    $this->errors[] = $message;
                }
                break;
            }
            $new = array_filter($value, function ($var) {
                return is_array($var);
            });
            $this->buildErrorsArray($new);
        }
    }

    /**
     * @return bool
     * @throws Exception
     */
    private function isTokenExpired(): bool
    {
        return new \DateTime() > new \DateTime($this->getTokenExpiry());
    }

    /**
     * @return HydrationService
     */
    private function hydrationService(): HydrationService
    {
        return new HydrationService();
    }

    /**
     * @throws XtrmException
     */
    private function throwException(): void
    {
        if (empty($this->getErrors()) === true) {
            $message = 'No error message available.';
        } else {
            $message = implode(', ', $this->getErrors());
        }
        throw new XtrmException($message);
    }
}
