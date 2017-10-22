<?php

namespace Jowusu837\HubtelMerchantAccount\Helpers;

use GuzzleHttp\Client;
use Jowusu837\HubtelMerchantAccount\MobileMoney\Refund\Request as RefundRequest;
use Jowusu837\HubtelMerchantAccount\MobileMoney\Refund\Response as RefundResponse;
use Jowusu837\HubtelMerchantAccount\MobileMoney\Receive\Request as ReceiveMobileMoneyRequest;
use Jowusu837\HubtelMerchantAccount\MobileMoney\Receive\Response as ReceiveMobileMoneyResponse;
use Jowusu837\HubtelMerchantAccount\OnlineCheckout\Request as OnlineCheckoutRequest;
use Jowusu837\HubtelMerchantAccount\OnlineCheckout\Response as OnlineCheckoutResponse;

class SendsRequests
{
    use FormatsRequests;

    protected $http;

    protected $config;

    private $auth;

    public function __construct($config)
    {
        $this->http = new Client(['base_uri' => 'https://api.hubtel.com']);
        $this->config = $config;
        $this->auth = [$this->config['api_key']['client_id'], $this->config['api_key']['client_secret']];
    }

    /**
     * @param ReceiveMobileMoneyRequest $request
     * @return ReceiveMobileMoneyResponse
     */
    public function sendReceiveMobileMoneyRequest(ReceiveMobileMoneyRequest $request)
    {
        $response = $this->http->request('POST', "/v1/merchantaccount/merchants/{$this->config['account_number']}/receive/mobilemoney", [
            'headers'=>[
                'Content-type' => 'application/json'
            ],
            'body' => $this->toJson($request),
            'auth' => $this->auth
        ]);

        $this->checkResponseStatus($response);

        return $this->flatten(json_decode((string)$response->getBody(),true));
    }

    /**
     * @param OnlineCheckoutRequest $request
     * @return OnlineCheckoutResponse
     */
    public function sendOnlineCheckoutRequest(OnlineCheckoutRequest $request)
    {
        if (!$request->store->name) {
            $request->store->name = $this->config['store']['name'];
        }

        $response = $this->http->request('POST', "/v1/merchantaccount/onlinecheckout/invoice/create", [
            'json' => json_decode(json_encode($request), true),
            'auth' => $this->auth
        ]);

        $this->checkResponseStatus($response);

        $invoiceResponse = json_decode((string)$response->getBody());

        return $invoiceResponse->response_text;
    }

    /**
     * @param $token
     * @return mixed
     */
    public function sendCheckInvoiceStatusRequest($token)
    {
        $response = $this->http->request('GET', "/v1/merchantaccount/onlinecheckout/invoice/status/{$token}");

        $this->checkResponseStatus($response);

        return json_decode((string)$response->getBody());
    }

    /**
     * @param RefundRequest $request
     * @return RefundResponse
     */
    public function sendRefundMobileMoneyRequest(RefundRequest $request)
    {
        $response = $this->http->request('POST', "/v1/merchantaccount/merchants/{$this->config['account_number']}/transactions/refund", [
            'headers'=>[
                'Content-type' => 'application/json'
            ],
            'body' => $this->toJson($request),
            'auth' => $this->auth
        ]);
        $this->checkResponseStatus($response);
        return $this->flatten(json_decode((string)$response->getBody(),true));
    }

    private function checkResponseStatus($response)
    {
        if ($response->getStatusCode() !== 200) {
            throw new \Exception((string)$response->getBody());
        }
        return $this;
    }
}