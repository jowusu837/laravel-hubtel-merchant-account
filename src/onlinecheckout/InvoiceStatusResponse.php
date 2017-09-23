<?php

namespace Jowusu837\HubtelMerchantAccount\OnlineCheckout;


class InvoiceStatusResponse
{
    /**
     * @var string
     */
    public $response_code;

    /**
     * @var string
     */
    public $response_text;

    /**
     * @var Invoice
     */
    public $invoice;
}