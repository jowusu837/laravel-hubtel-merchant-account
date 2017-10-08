<?php
/**
 * Created by PhpStorm.
 * User: ProductMgr_170
 * Date: 9/23/2017
 * Time: 8:39 PM
 */

namespace Jowusu837\HubtelMerchantAccount;

use GuzzleHttp\Client;
use Jowusu837\HubtelMerchantAccount\RefundRequest;
use Jowusu837\HubtelMerchantAccount\RefundResponse;
use Jowusu837\HubtelMerchantAccount\Helpers\SendsRequests;
use Jowusu837\HubtelMerchantAccount\TransactionStatusRequest;
use Jowusu837\HubtelMerchantAccount\ReceiveMobileMoneyResponse;
use Jowusu837\HubtelMerchantAccount\OnlineCheckout\Request as OnlineCheckoutRequest;
use Jowusu837\HubtelMerchantAccount\OnlineCheckout\Response as OnlineCheckoutResponse;
use Jowusu837\HubtelMerchantAccount\OnlineCheckout\InvoiceStatusResponse as OnlineCheckoutInvoiceStatusResponse;

class MerchantAccount
{
    /** @var SendsRequests */
    protected $http;

    /**
     * @param array $config
     */
    public function __construct(SendsRequests $http)
    {
        $this->http = $http;
    }

    /**
     * Receive mobile money
     *
     * @param ReceiveMobileMoneyRequest $request
     * @return ReceiveMobileMoneyResponse
     */
    public function receiveMobileMoney(ReceiveMobileMoneyRequest $request)
    {
        $response = $this->http->sendReceiveMobileMoneyRequest($request);
        return new ReceiveMobileMoneyResponse(...$response);
    }

//    public function sendMobileMoney()
//    {
//        throw new \Exception("Method not yet implemented");
//    }
//
    /**
     * Refund mobile money
     *
     * @param RefundRequest $request
     * @return RefundResponse
     */
   public function refundMobileMoney(RefundRequest $request)
   {
        $response = $this->http->sendRefundMobileMoneyRequest($request);
        return new RefundResponse(...$response);
   }

    /**
     * Online checkout
     *
     * @param OnlineCheckoutRequest $request
     * @return mixed
     */
    public function onlineCheckout(OnlineCheckoutRequest $request)
    {
        $checkout_url = $this->http->sendOnlineCheckoutRequest($request);
        return header('Location: ' . $checkout_url);;
    }

    /**
     * Check online checkout invoice status
     *
     * @param string $token
     * @return OnlineCheckoutInvoiceStatusResponse
     */
    public function checkInvoiceStatus($token)
    {
        $response = $this->http->sendCheckInvoiceStatusRequest($token);
        return $response;
    }

    /**
     * Check transaction status
     *
     * @param TransactionStatusRequest $request
     * @return TransactionStatusResponse
     */
   public function transactionStatus(TransactionStatusRequest $request)
   {
       $response = $this->http->sendTransactionStatusRequest($request);
       return new TransactionStatusResponse($response);
   }
}