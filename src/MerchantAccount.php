<?php
/**
 * Created by PhpStorm.
 * User: ProductMgr_170
 * Date: 9/23/2017
 * Time: 8:39 PM
 */

namespace Jowusu837\HubtelMerchantAccount;

use GuzzleHttp\Client;
use Jowusu837\HubtelMerchantAccount\OnlineCheckout\Request as OnlineCheckoutRequest;
use Jowusu837\HubtelMerchantAccount\OnlineCheckout\Response as OnlineCheckoutResponse;
use Jowusu837\HubtelMerchantAccount\OnlineCheckout\InvoiceStatusResponse as OnlineCheckoutInvoiceStatusResponse;


class MerchantAccount
{

    /**
     * @var string
     */
    protected $merchantAccountNumber;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    public function __construct()
    {
        $this->merchantAccountNumber = env('HUBTEL_MERCHANT_ACCOUNT_NUMBER');
        $this->username = env('HUBTEL_MERCHANT_ACCOUNT_CLIENT_ID');
        $this->password = env('HUBTEL_MERCHANT_ACCOUNT_CLIENT_SECRET');

        if (!$this->merchantAccountNumber || !$this->username || !$this->password) {
            throw new \Exception('Please ensure that HUBTEL_MERCHANT_ACCOUNT_NUMBER, HUBTEL_MERCHANT_ACCOUNT_CLIENT_ID and HUBTEL_MERCHANT_ACCOUNT_CLIENT_SECRET are properly configured in your .env file.');
        }
    }

    /**
     * Receive mobile money
     *
     * @param ReceiveMobileMoneyRequest $request
     * @return ReceiveMobileMoneyResponse
     * @throws \Exception
     */
    public function receiveMobileMoney(ReceiveMobileMoneyRequest $request)
    {
        $http = new Client(['base_uri' => 'https://api.hubtel.com']);

        $response = $http->request('POST', "/v1/merchantaccount/merchants/{$this->merchantAccountNumber}/receive/mobilemoney", [
            'json' => json_decode($request, true),
            'auth' => [$this->username, $this->password]
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new \Exception((string)$response->getBody());
        }

        return json_encode((string)$response->getBody());
    }

    public function sendMobileMoney()
    {
        throw new \Exception("Method not yet implemented");
    }

    public function refundMobileMoney()
    {
        throw new \Exception("Method not yet implemented");
    }

    /**
     * Online checkout
     *
     * @param OnlineCheckoutRequest $request
     * @return mixed
     * @throws \Exception
     */
    public function onlineCheckout(OnlineCheckoutRequest $request)
    {
        $http = new Client(['base_uri' => 'https://api.hubtel.com']);

        $response = $http->request('POST', "/v1/merchantaccount/onlinecheckout/invoice/create", [
            'json' => json_decode($request, true),
            'auth' => [$this->username, $this->password]
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new \Exception((string)$response->getBody());
        }

        /** @var OnlineCheckoutResponse $invoiceResponse */
        $invoiceResponse = json_encode((string)$response->getBody());

        return redirect($invoiceResponse->response_text);
    }

    /**
     * Check online checkout invoice status
     *
     * @param string $token
     * @return OnlineCheckoutInvoiceStatusResponse
     * @throws \Exception
     */
    public function checkInvoiceStatus($token)
    {
        $http = new Client(['base_uri' => 'https://api.hubtel.com']);

        $response = $http->request('GET', "/v1/merchantaccount/onlinecheckout/invoice/status/{$token}");

        if ($response->getStatusCode() !== 200) {
            throw new \Exception((string)$response->getBody());
        }

        return json_encode((string)$response->getBody());
    }

    public function transactionStatus()
    {
        throw new \Exception("Method not yet implemented");
    }
}