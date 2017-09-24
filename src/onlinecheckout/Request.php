<?php

namespace Jowusu837\HubtelMerchantAccount\OnlineCheckout;


class Request
{
    /**
     * @var Invoice
     */
    public $invoice;

    /**
     * @var Store
     */
    public $store;

    /**
     * @var Actions
     */
    public $actions;

    /**
     * @var mixed
     */
    public $custom_data;
}