<?php
/**
 * Created by PhpStorm.
 * User: ProductMgr_170
 * Date: 9/23/2017
 * Time: 8:39 PM
 */

namespace Jowusu837\HubtelMerchantAccount;


use Jowusu837\HubtelMerchantAccount\Helpers\SendsRequests;
use Jowusu837\HubtelMerchantAccount\OnlineCheckout\Request as OnlineCheckoutRequest;
use Jowusu837\HubtelMerchantAccount\OnlineCheckout\InvoiceStatusResponse as OnlineCheckoutInvoiceStatusResponse;

class MerchantAccount
{
    /** @var SendsRequests */
    protected $http;

    /**
     * @param SendsRequests $http
     * @internal param array $config
     */
    public function __construct(SendsRequests $http)
    {
        $this->http = $http;
    }

    /**
     * Receive mobile money
     *
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function receiveMobileMoney(Request $request)
    {
        $response = $this->http->sendReceiveMobileMoneyRequest($request);
        return new Response(...$response);
    }

    public function refundMobileMoney(Request $request)
    {
        $response = $this->http->sendRefundMobileMoneyRequest($request);
        return new Response(...$response);
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
        $checkout_url = $this->http->sendOnlineCheckoutRequest($request);
        return header('Location: ' . $checkout_url);
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
        $response = $this->http->sendCheckInvoiceStatusRequest($token);
        return $response;
    }

}