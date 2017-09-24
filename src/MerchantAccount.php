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
use Illuminate\Config\Repository as ConfigRepository;


class MerchantAccount
{
    /** @var \Illuminate\Config\Repository */
    protected $config;

    /**
     * @param \Illuminate\Config\Repository $config
     */
    public function __construct(/*ConfigRepository */ $config)
    {
        $this->config = $config;
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

        $response = $http->request('POST', "/v1/merchantaccount/merchants/{$this->config->get('account_number')}/receive/mobilemoney", [
            'json' => json_decode($request, true),
            'auth' => [$this->config->get('api_key.client_id'), $this->config->get('api_key.client_secret')]
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new \Exception((string)$response->getBody());
        }

        return json_decode((string)$response->getBody());
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
        if (!$request->store->name) {
            $request->store->name = $this->config->get('store.name');
        }

        $http = new Client(['base_uri' => 'https://api.hubtel.com']);

        $response = $http->request('POST', "/v1/merchantaccount/onlinecheckout/invoice/create", [
            'json' => json_decode(json_encode($request), true),
            'auth' => [$this->config->get('api_key.client_id'), $this->config->get('api_key.client_secret')]
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new \Exception((string)$response->getBody());
        }

        $invoiceResponse = json_decode((string)$response->getBody());

        return header('Location: '. $invoiceResponse->response_text);;
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

        return json_decode((string)$response->getBody());
    }

    public function transactionStatus()
    {
        throw new \Exception("Method not yet implemented");
    }
}